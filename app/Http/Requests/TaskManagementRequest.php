<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//销售任务管理Request
class TaskManagementRequest extends Request
{
  public function attributes()
    {
        return [

        ];
    }
   public function rules()
    {
    switch($this->method())
           {
               // CREATE
               case 'POST':
               {
                   return [

                   ];
               }
               // UPDATE
               case 'PUT':
               case 'PATCH':
               {
                   return [

                   ];
               }
               case 'GET':
               case 'DELETE':
               default:
               {
                   return [];
               };
           }

       }

       public function messages()
       {
           return [


           ];
       }

}