<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;


class Profile extends Resource
{
    public static $group = 'Account';

    /**
     * The model the resource corresponds to.
     *
     * @var  string
     */
    public static $model = \App\Models\Profile::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Profiles');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Profile');
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
                                                                BelongsTo::make('User')

->searchable()
->sortable()
,
                                                                Select::make( __('Title'),  'title')
->sortable()
->options([
	    	    'bro' => 'Bro',
                'sis' => 'Sis',
                'mr' => 'Mr',
	    	    'mrs' => 'Mrs',
	    	    'dr' => 'Dr',
                'sir' => 'Sir',
                'dcn' => 'Dcn',
	    	    'dcns' => 'Dcns',
	    	    'pst' => 'Pst',
	    	])
,
                                                                Text::make( __('Name'),  'name')
->sortable()
,
Text::make( __('Phone'),  'phone')
->sortable()
,
Text::make( __('Kings Chat No'),  'kings_chat')
->sortable()
,
Text::make('Email')
->sortable()
->rules('required', 'email', 'max:254'),
                                                                Date::make( __('Date Of Birth'),  'date_of_birth')
->sortable()
,
                                                                Select::make( __('Marital Status'),  'marital_status')
->sortable()
->options([
    		    'single' => 'Single',
	    	    'married' => 'Married',
	    	])
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
        return [];
    }
}
