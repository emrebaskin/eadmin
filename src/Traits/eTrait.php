<?php

namespace EmreBaskin\Eadmin\Traits;

use Illuminate\Http\Request;


trait eTrait
{

    /**
     * @param array $properties
     *
     * @return string
     */
    public static function datatableAjaxResponse($request,$model)
    {

        $columns = [];

        foreach ($request->input('columns') as $column) {
            $columns[] = $column['data'];
        }

        $order  = $request->input('order')[0];
        $search = false;

        if ($request->input('search')['value'] !== '' && $request->input('search')['value'] !== null) {

            $search = '%' . $request->input('search')['value'] . '%';

        }

        eval('$categories = '.$model.'::select($columns);');
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

        eval('$total = '.$model.'::all()->count();');

        eval('$filtered = '.$model.'::select($columns);');
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
            "recordsFiltered" => $filtered,
            "data"            => $data,
        ];

        return response()->json($datas);

    }
    
}
