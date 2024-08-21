@extends("layouts.master")
@section('title') BikeShop | รายการสินค้า @stop
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="container">
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>รูปสินค้า </th>
    <th>รหัส</th>
    <th>ชื่อสินค้า </th>
    <th>ประเภท</th>
    <th>คงเหลือ</th>
    <th>ราคาต่อหน่วย</th>
    <th>การทํางาน</th>
    </tr>
    </thead> 
    <tbody>
    @foreach($products as $p) 
    <tr>
    
    <td>{{ $p->image_url }}</td>
    <td>{{ $p->code }}</td>
    <td>{{ $p->name }}</td>
    <td>{{ $p->category->name }}</td>
    <td>{{ $p->stock_qty }}</td>
    <td>{{ $p->price }}</td>
    <td> 
    <a href="#" class="btn btn-info"><i class="fa fa-edit"></i> แก้ไข</a>
    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> ลบ</a>
    </td>
    
    </tr> @endforeach
    </tbody>
    </table>
</div>
    
</body>
</html>
@endsection