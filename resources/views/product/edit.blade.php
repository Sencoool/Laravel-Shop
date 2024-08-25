@extends('layouts.master') @section('title') Shop @stop
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <div>{{ $error}}</div>
    @endforeach
</div>
@endif

<div class="container">
    <h1>แก้ไขสินค้า</h1>
    <ul class="breadcrumb">
        <li><a href="{{ URL::to('product')}}">หน้าแรก</a></li>
        <li class="active">แก้ไขสินค้า</li>
    </ul>
    {!! Form::model($product,array('action' => 'App\Http\Controllers\ProductController@update','method'=> 'post','enctype' => 'multipart/form-data'))!!}
    <input type="hidden" name="id" value={{ $product->id}}>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>รายการข้อมูลสินค้า</strong>
            </div>
        </div>
        <div class="panel-body">
            {!! Form::model($product, array('method' => 'post', 'enctype' => 'multipart/form-data')) !!}
            <input type="hidden" name="id" value="{{ $product->id}}">
            <table>
                <tr>
                    <td>{{ Form::label('code','รหัสสินค้า')}}</td>
                    <td>{{ Form::text('code',$product->code,['class' => 'form-control'])}}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('name','ชื่อ')}}</td>
                    <td>{{ Form::text('name',$product->name,['class' => 'form-control'])}}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('category_id','ประเภทสินค้า')}}</td>
                    <td>{{ Form::select('category_id',$categories,Request::old('category_id'),['class' => 'form-control']) }}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('stock_qty','คงเหลือ')}}</td>
                    <td>{{ Form::text('stock_qty',$product->stock_qty,['class' => 'form-control'])}}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('price','ราคาต่อหน่วย')}}</td>
                    <td>{{ Form::text('price',$product->price,['class' => 'form-control'])}}</td>
                </tr>
                <tr>
                    <td>{{ Form::label('image','รูปภาพ')}}</td>
                    <td>{{ Form::file('image')}}</td>
                </tr>
                @if($product->image_url)
                <tr>
                    <td><strong>รูปสินค้า</strong></td>
                    <td><img src="{{ URL::to($product->image_url)}}" alt=""></td>
                </tr>
                @endif
            </table>
        </div>
        <div class="panel-footer">
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
        </div>
    </div>
</div>

{!! Form::close() !!}

{!! Form::close() !!}
@endsection