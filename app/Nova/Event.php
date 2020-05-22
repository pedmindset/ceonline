<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Trix;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;


class Event extends Resource
{
    public static $group = 'Event Center';

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Event::class;

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
        return __('Events');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Event');
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
            Images::make('Banner', 'banner') // second parameter is the media collection name
            ->conversionOnIndexView('thumb') // conversion used to display the image
            ->rules('required')
            ->singleImageRules('dimensions:min_width=1280'), // validation rules

            ID::make( __('Id'),  'id')
            ->rules('required')
            ->sortable()
            ,
            BelongsTo::make('Church')
            ->searchable()
            ->sortable()
            ,
            BelongsToMany::make('Services')
            ->sortable()
            ,

            BelongsToMany::make('Users')
            ->sortable()
            ,

            Text::make( __('Title'),  'title')
            ->sortable()
            ->rules('required')
            ->creationRules('unique:events,title')
            ->updateRules('unique:events,title,{{resourceId}}'),

            Text::make( __('Slug'),  'slug')
            ->sortable()
            ->exceptOnForms(),


            Place::make( __('Address'),  'Address')
            ->sortable()
            ,


            Trix::make( __('Description'),  'description')->hideFromIndex()
            ->sortable()
            ,


            DateTime::make( __('Start Date'),  'start_date')
            ->sortable()
            ,
            DateTime::make( __('End Date'),  'end_date')
            ->sortable()
            ,


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
