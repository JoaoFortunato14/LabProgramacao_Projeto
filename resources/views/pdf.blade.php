<div class="card-header py-3">
          <h4 class="m-0 font-weight-bold text-primary">Order Receipt</h4>
          <h6 class="font-weight-bold text-primary">{{session()->get('email')}}</h6>
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                {{!$products = Cart::getContent()}}
                @if($products)
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}&euro;</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
                <strong>Total Quantity:{{ Cart::getTotalQuantity()}}<br>Total: {{ Cart::getSubTotal() }}&euro;</strong>
          </div>
        </div>
