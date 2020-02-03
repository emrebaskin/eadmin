<?php

namespace EmreBaskin\Eadmin\Helpers;


use Illuminate\Support\Facades\Session;

class eHelper
{

    /**
     * @param $request
     * @param $model
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function datatableAjaxResponse($request, $model)
    {

        $columns = [];

        foreach ($request->input('columns') as $column) {

            if ($column['data'] === null) {
                continue;
            }

            $columns[] = $column['data'];

        }

        if ( ! in_array('id', $columns)) {

            $columns[] = 'id';

        }

        $order  = $request->input('order')[0];
        $search = false;

        if ($request->input('search')['value'] !== '' && $request->input('search')['value'] !== null) {

            $search = '%' . $request->input('search')['value'] . '%';

        }

        eval('$categories = ' . $model . '::select($columns);');
        $data = $categories->where(function ($query) use ($columns, $search) {

            if ($search === false) {
                return;
            }

            foreach ($columns as $column) {

                if ($column === 'id') {
                    continue;
                }

                $query->orWhere($column, 'LIKE', $search);

            }

        })
            ->orderBy($columns[$order['column']], $order['dir'])
            ->skip($request->input('start'))
            ->take($request->input('length'))
            ->get()
            ->toArray();

        eval('$total = ' . $model . '::all()->count();');
        eval('$filtered = ' . $model . '::select($columns);');

        $filtered->where(function ($query) use ($columns, $search) {

            if ($search === false) {

                return;

            }

            foreach ($columns as $column) {

                if ($column === 'id') {

                    continue;

                }

                $query->where($column, 'LIKE', $search);

            }

        })
            ->get()
            ->count();


        $datas = [
            "draw"            => $request->input('draw'),
            "recordsTotal"    => $total,
            "recordsFiltered" => is_int($filtered) ? $filtered : 0,
            "data"            => $data,
        ];

        return response()->json($datas);

    }


    /**
     * @param $type
     * @param null $message
     *
     * @return array
     */
    public static function createAlert($type, $message = null)
    {

        $alert = [
            'eAlert' => [
                'type'    => strtolower($type),
                'message' => $message ?? __('Alert'),
            ],
        ];

        return $alert;

    }

}
