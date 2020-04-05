<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;


class Service extends Resource
{
    public static $group = 'Service Center';

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Service::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Services');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Service');
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
            ->searchable()
            ->sortable()
            ,
            BelongsTo::make('ServiceType')
            ->sortable()
            ,
                        
            Text::make( __('Title'),  'title')
            ->sortable()
            ,

            Select::make( __('Type'),  'type')
            ->sortable()
            ->options([
                'onsite' => 'onsite',
                'online' => 'online',
            ])
            ,
            Textarea::make( __('Description'),  'description')->hideFromIndex()
            ->sortable()
            ,
            Text::make( __('Link'),  'link')->hideFromIndex()
            ->sortable()
            ,
            Select::make( __('Platform'),  'platform')
            ->sortable()
            ->options([
                    'youtube' => 'youtube',
                    'facebook' => 'facebook',
                    'vimeo' => 'vimeo',
                    'imm' => 'imm',
                    'other' => 'other',
                ])
            ,
            DateTime::make( __('Start Date'),  'start_date')
            ->sortable()
            ,
            DateTime::make( __('End Date'),  'end_date')
            ->sortable()
            ,

            HasMany::make('Videos'),
            HasMany::make('FirstTImers'),
            HasMany::make('Salvations'),
            HasMany::make('Payments'),
            HasMany::make('Attendances'),
            HasMany::make('Announcements'),
            HasMany::make('Comments'),

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
        return [];
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
