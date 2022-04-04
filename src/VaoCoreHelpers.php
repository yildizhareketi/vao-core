<?php

namespace Atak011\VaoCore;

use Carbon\Carbon;
use Illuminate\Support\Str;

class VaoCoreHelpers
{

    public function createRandomCode($prefix,$includeYear = false,$length = 8)
    {
        $rand = strtoupper(Str::random(8));

        $year = $includeYear ? Carbon::now()->year:null;

        return $prefix.$year.$rand;
    }

    public function generateActionsButton($data)
    {
        $str = '';
        foreach ($data as $key => $value) {
            if ($key == 'edit') {
                $str .= '<a href="'.$value.'">
                            <button type="button" class="btn btn-sm btn-warning js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Düzenle">
                                     <i class="fa fa-pencil-alt"></i>
                            </button>
                         </a>';
            }
            if ($key == 'show') {
                $str .= '<a href="'.$value.'">
                              <button type="button" class="btn btn-sm btn-success js-tooltip-enabled ml-1" data-toggle="tooltip" title="" data-original-title="Görüntüle">
                                     <i class="fa fa-eye"></i>
                            </button>
                         </a>';
            }
            if ($key == 'delete') {
                $str .= '<a onclick="deleteData(\''.$value.'\')">
                            <button type="button" class="btn btn-sm btn-danger js-tooltip-enabled ml-1 deleteAction">
                                     <i class="fa fa-trash"></i>
                            </button>
                         </a>';
            }

        }
        return '<div class="btn-group">
                           '.$str.'
                        </div>';

    }



}
