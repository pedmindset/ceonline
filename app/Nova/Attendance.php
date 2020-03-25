<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;


class Attendance extends Resource
{
    public static $group = 'Service Center';

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'user' => ['name', 'email'],
    ];


    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Attendance::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'count';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'count'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Attendances');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Attendance');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function fields(Request $request)
    {
        return [
                                                ID::make( __('Id'),  'id')
->rules('required')
->sortable()
,
                                                                BelongsTo::make('Church')


->sortable()
,
                                                                BelongsTo::make('User')

                                                                ->searchable()

->sortable()
,
                                                                BelongsTo::make('Service')


->sortable()
,
                                                                Number::make( __('Count'),  'count')
->sortable()
->step(1)
,

DateTime::make('created_at')
->sortable()
->onlyOnIndex(),

DateTime::make('updated_at')
->sortable()
->onlyOnIndex(),
                                                                                            ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function cards(Request $request)
    {
        return [
            (new \App\Nova\Metrics\NewAttendance),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  array
     */
    public function actions(Request $request)
    {
        return [
            new \Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel,

        ];
    }
}
