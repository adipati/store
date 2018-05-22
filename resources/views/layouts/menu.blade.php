    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Menu
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                    <a href="{{ route('distributors.index') }}" class="list-group-item list-group-item-action {{ Request::segment(1)=='distributors' ? 'active' : '' }}"><i class="fa fa-group"></i> Avostore</a>
                    <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action {{ Request::segment(1)=='products' ? 'active' : '' }}"><i class="fa fa-list"></i> Produk Item</a>
                    <a href="{{ route('transactions.index') }}" class="list-group-item list-group-item-action {{ Request::segment(1)=='transactions' ? 'active' : '' }}"><i class="fa fa-file"></i> Transaksi</a>
                </div>
            </div>
        </div>
    </div>