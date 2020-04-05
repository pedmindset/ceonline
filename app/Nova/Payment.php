<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;


class Payment extends Resource
{
    public static $group = 'Accounting';

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
    public static $model = \App\Models\Payment::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var  string
     */
    public static $title = 'amount';

    /**
     * The columns that should be searched.
     *
     * @var  array
     */
    public static $search = [
        'id', 'amount', 'status'
    ];

    /**
     * Get the displayable label of the resource.
     *
     * @return  string
     */
    public static function label()
    {
        return __('Payments');
    }

    /**
    * Get the displayable singular label of the resource.
    *
    * @return  string
    */
    public static function singularLabel()
    {
        return __('Payment');
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
            BelongsTo::make('PaymentCategory')
            ->rules('required')
            ->sortable()
            ,

            BelongsTo::make('User')
            ->searchable()
            ->sortable()
            ,
                

            BelongsTo::make('Service')
            ->sortable()
            ,
            Text::make( __('Currency'),  'currency')
            ->sortable()
            ,
            Number::make( __('Amount'),  'amount')
            ->rules('required')
            ->sortable()
            ->step(0.01)
            ,
            Select::make( __('Status'),  'status')
            ->sortable()
            ->options([
    		    'success' => 'success',
	    	    'failed' => 'failed',
	    	    'pending' => 'pending',
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
        return [
            (new \App\Nova\Metrics\newPayments),
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
