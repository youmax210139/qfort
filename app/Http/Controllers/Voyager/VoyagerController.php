<?php

namespace App\Http\Controllers\Voyager;

use Analytics;
use Config;
use Spatie\Analytics\Period;
use TCG\Voyager\Http\Controllers\VoyagerController as BaseVoyagerController;

class VoyagerController extends BaseVoyagerController
{
    public function country()
    {
        $country = Analytics::performQuery(Period::days(14), 'ga:sessions', ['dimensions' => 'ga:country', 'sort' => '-ga:sessions']);
        $result = collect($country['rows'] ?? [])->map(function (array $dateRow) {
            return [
                'country' => $dateRow[0],
                'sessions' => (int) $dateRow[1],
            ];
        });
        /* $data['country'] = $result->pluck('country'); */
        /* $data['country_sessions'] = $result->pluck('sessions'); */
        return $result;
    }

    public function topbrowsers()
    {
        $analyticsData = Analytics::fetchTopBrowsers(Period::days(14));
        $array = $analyticsData->toArray();
        foreach ($array as $k => $v) {
            $array[$k]['label'] = $array[$k]['browser'];
            unset($array[$k]['browser']);
            $array[$k]['value'] = $array[$k]['sessions'];
            unset($array[$k]['sessions']);
            $array[$k]['color'] = $array[$k]['highlight'] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }
        return json_encode($array);
    }

    public function index()
    {
        $analyticsData_one = Analytics::fetchTotalVisitorsAndPageViews(Period::days(14));
        $this->data['dates'] = $analyticsData_one->pluck('date');
        $this->data['visitors'] = $analyticsData_one->pluck('visitors');
        $this->data['pageViews'] = $analyticsData_one->pluck('pageViews');

        /* $analyticsData_two = Analytics::fetchVisitorsAndPageViews(Period::days(14)); */
        /* $this->data['two_dates'] = $analyticsData_two->pluck('date'); */
        /* $this->data['two_visitors'] = $analyticsData_two->pluck('visitors')->count(); */
        /* $this->data['two_pageTitle'] = $analyticsData_two->pluck('pageTitle')->count(); */

        /* $analyticsData_three = Analytics::fetchMostVisitedPages(Period::days(14)); */
        /* $this->data['three_url'] = $analyticsData_three->pluck('url'); */
        /* $this->data['three_pageTitle'] = $analyticsData_three->pluck('pageTitle'); */
        /* $this->data['three_pageViews'] = $analyticsData_three->pluck('pageViews'); */

        $this->data['browserjson'] = $this->topbrowsers();

        $result = $this->country();
        $this->data['country'] = $result->pluck('country');
        $this->data['country_sessions'] = $result->pluck('sessions');

        $this->data['ceci_ver'] = config('mycms.ceci_ver');
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        return view('voyager::index', $this->data);
    }
}
