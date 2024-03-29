@extends('layout')

@section('title', 'Cart')

@section('content')

    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>

        @if(!empty($cart))
            @foreach($cart as $cartItem)
                <?php $id = $cartItem->item_id?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ asset('images/3.png') }}"
                                     width="100" height="100" class="img-responsive"/>
                            </div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cartItem->item->name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $cartItem->item->price }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $cartItem->quantity }}" class="form-control quantity"/>
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $cartItem->item->price * $cartItem->quantity }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i
                                class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i
                                class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
        <tfoot>
        <tr>
            <td>
                <a href="{{ url('/') }}" class="btn btn-warning">
                    <i class="fa fa-angle-left"></i> Continue Shopping
                </a>
            </td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            @if(!$cart->isEmpty())
                <td colspan="4">
                    <a href="{{ url('/checkout') }}" class="btn btn-dark">
                        checkout <i class="fa fa-angle-right"></i>
                    </a>
                </td>
            @endif
        </tr>
        </tfoot>
    </table>

@endsection
@section('scripts')
    <script type="text/javascript">

        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection
