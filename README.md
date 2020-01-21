```
'providers' => [
  ...
  EmreBaskin\Eadmin\Providers\eServiceProviders::class,
];
```


#### Usage

**eForm::open()**

 - available & default options:
```
    [
        'method'  => 'POST',
        'action'  => '#',
        'class'   => '',
        'enctype' => '',
    ]
```

- example: 

```
    {!! eForm::open(['action'  => route("saveForm"), 'class'   => 'register-form']) !!}
```

**eForm::close()**

 - no available options

**eForm::input()**

 - available & default options:
```
    [
        'id'          => 'input-' . rand(100000000, 999999999),
        'name'        => 'unnamed' . rand(100000000, 999999999),
        'type'        => 'text',
        'label'       => '',
        'placeholder' => null,
        'value'       => '',
        'class'       => '',
        'disabled'    => false,
        'grid'        => 12,
    ];
```

- example: 

```
    {!! 
        eForm::input([
            'name'        => 'email',
            'type'        => 'email', 
            'class'       => 'form-control', 
            'placeholder' => 'example@example.com', 
            'grid'        => 6
        ]) 
    !!}
```


**eForm::textarea()**

 - available & default options:
```
    [
        'id'          => 'input-' . rand(100000000, 999999999),
        'name'        => 'unnamed' . rand(100000000, 999999999),
        'rows'        => 3,
        'label'       => '',
        'placeholder' => null,
        'value'       => '',
        'class'       => '',
        'disabled'    => false,
        'grid'        => 12,
    ];
```

- example: 

```
    {!! 
        eForm::textarea([
            'name'        => 'description',
            'class'       => 'form-control', 
            'placeholder' => 'Description..', 
            'value'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae lorem est.',
        ]) 
    !!}
```

**eForm::select()**

 - available & default options:
```
    [
        'id'          => 'input-' . rand(100000000, 999999999),
        'name'        => 'unnamed' . rand(100000000, 999999999),
        'datas'       => [],
        'selected'    => null,
        'noScript'    => false,
        'label'       => '',
        'placeholder' => null,
        'value'       => '',
        'class'       => '',
        'disabled'    => false,
        'grid'        => 12,
    ];
```

- example: 

```
    {!! 
        eForm::select([
            'name'        => 'category',
            'class'       => 'form-control', 
            'placeholder' => 'Select Category', 
            'selected'    => '1001_1003',
            'datas'       => [
                    '1000'      => 'Root', 
                    '1001'      => 'Computer', 
                    '1001_1003' => 'Computer > Desktop',  
                    '1001_1004' => 'Computer > Laptop',
                    '1002'      => 'Phone'
                ]
        ]) 
    !!}
```

**eForm::button()**

 - available & default options:
```
    [
        'id'       => 'button-' . rand(100000000, 999999999),
        'label'    => __('Button'),
        'class'    => '',
        'color'    => 'dark',
        'disabled' => false,
    ];
```

- example: 

```
    {!! 
        eForm::button([
            'id'    => 'sendbutton',
            'class' => 'form-control', 
            'color' => 'primary', 
            'label' => 'Send Form'
        ]) 
    !!}
```


**eComp::table()**

 - available & default options:
```
    [
        'id'       => 'table-' . rand(100000000, 999999999),
        'class'    => '',
        'datas'    => [],
        'columns'  => [],
        'noScript' => false,
        'ajax'     => false,
    ];
```

- example: 

```
    {!! 
        eComp::table([
            'columns' => [
                'id'        => 'ID',
                'name'      => 'Name',
                'full_name' => 'Full Name',
            ],
            'ajax' => route('admin.categories.api.table'),
            'actionButtons' => [
                'edit' => 'admin.category.update',
                'delete' => 'admin.category.delete.action'
            ]
        ]) 
    !!}
```



**eHelper**

- controller:
```
    use EmreBaskin\Eadmin\Helpers\eHelper;

    return eHelper::datatableAjaxResponse($request,"App\Models\Category");
```




