@extends('master')



@section('menu')

    <ul>
        <li>
            <a href="/products">List</a>
        </li>
    </ul>

@stop



@section('content')

    <main class="products-edit">

        <div id="products" class="column {{ Session::get('notification') || $errors->any() ? 'ui-notify' : '' }}">

            @if ( $errors->any() )

                <div class="ui-notification error">{{ $errors->first() }}</div>

            @endif

            @if ( Session::get( 'notification' ) )

                <div class="ui-notification success">{{ Session::get('notification') }}</div>

            @endif

            <div class="inner">

                <div class="top"></div>

                <div class="list">

                    @foreach ( $products as $product )

                        <li data-pid="{{ $product->id }}" class="product {{ Session::get('productId') === $product->id ? 'invalid' : '' }}">

                            {!! Form::open([ 'url' => 'products/update', 'id' => 'updateProductForm' ]) !!}

                                {!! Form::hidden( 'id', $product->id ) !!}

                                {!! Form::text( 'name', Session::get('productId') === $product->id ? Session::get('productName') : $product->name, [ 'class' => 'name', 'required' ] ) !!}

                                <select name="section_id" required>

                                    <option value="" disabled selected>
                                        Choose...
                                    </option>

                                    @foreach ( $sections as $id => $name )

                                        <option value="{{ $id }}" {{ $id == $product->section_id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>

                                    @endforeach

                                </select>

                                <button type="submit" class="btn">
                                    Save
                                </button>

                            {!! Form::close() !!}

                        </li>

                    @endforeach

                </div>
            </div>


            <iframe src="{{ url('/print') }}" frameborder="0" id="print-frame"></iframe>

        </div>

    </main>

@stop
