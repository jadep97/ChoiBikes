@extends('layouts.app', ['activePage' => 'item-management', 'titlePage' => __('Item Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">

              <div class="card-header card-header-primary">
                <h4 class="card-title ">Item Category</h4>
                <p class="card-category"> Managing Inventory Items</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <!-- ara ang last na imo g buhat mag route ka sa buttong para maka search -->
                <form class="form"  method="get" action="/itemsearch">
                  <div class="col-sm-12">
                     <!-- select for category -->

                        <select class="browser-default custom-select" searchable="Search here.." name="category" id="category">
                         <option value="" disabled selected>Select Category</option>
                      @foreach($items as $item)
                        <option value="{{ $item->category }}" >{{ $item->category }}</option>
                      @endforeach()
                    </select>
                 
                    
                    <!-- select for brands -->

                      <select class="browser-default custom-select" searchable="Search here.." name="brandName" id="brandName">
                         <option value="" disabled selected>Select Brand</option>
                      @foreach($items as $item)
                        <option value="{{ $item->brandName }}" >{{ $item->brandName }}</option>
                      @endforeach()
                    </select>

                     <button type="submit" class="btn btn-primary btn-block mb-4">Search</button>

                  </div>
                  </div>
                </form>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          Item Name
                      </th>
                      <th>
                          Brands
                      </th>
                      <th>
                        Category
                      </th>
                      <th class="text-center">
                        Actions
                      </th>
                    </thead>
                    <tbody>
                      @foreach($searchItem as $srchItem)
                        <tr>
                          <td>
                            {{ $srchItem->itemName }}
                          </td>
                          <td>
                            {{ $srchItem->brandName }}
                          </td>
                          <td>
                            {{ $srchItem->category }}
                          </td>
                          <td class="text-center">

                            <!-- Button trigger modal for delete item -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteItem{{ $srchItem->id }}">
                              Delete
                            </button>

                            <!-- Modal delete item -->
                            <div class="modal fade" id="deleteItem{{ $srchItem->id }}" tabindex="-1" role="dialog" aria-labelledby="itemDelete" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="itemDelete">Item Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <ul class="list-group">
                                      <li class="list-group-item"> ITEM NAME: {{ $srchItem->itemName }}</li>
                                      <li class="list-group-item"> BRAND NAME: {{ $srchItem->brandName }}</li>
                                      <li class="list-group-item"> CATEGORY: {{ $srchItem->category }}</li>
                                      <li class="list-group-item"> STOCKS: {{ $srchItem->stocks }}</li>
                                      <li class="list-group-item"> PRICE: {{ $srchItem->price }}</li>
                                      <li class="list-group-item"> LAST PRICE: {{ $srchItem->lastPrice }}</li>
                                    </ul>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" href="{{ route('item.destroy', $item->id) }}">Delete Item</button>
                                  </div>

                                </div>
                              </div>
                            </div>

                              <!-- Button trigger modal for view item -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showItem{{ $srchItem->id }}">
                              View
                            </button>

                            <!-- Modal view item -->
                            <div class="modal fade" id="showItem{{ $srchItem->id }}" tabindex="-1" role="dialog" aria-labelledby="showItemDetails" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="showItemDetails">Item Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <ul class="list-group">
                                      <li class="list-group-item"> ITEM NAME: {{ $srchItem->itemName }}</li>
                                      <li class="list-group-item"> BRAND NAME: {{ $srchItem->brandName }}</li>
                                      <li class="list-group-item"> CATEGORY: {{ $srchItem->category }}</li>
                                      <li class="list-group-item"> STOCKS: {{ $srchItem->stocks }}</li>
                                      <li class="list-group-item"> PRICE: {{ $srchItem->price }}</li>
                                      <li class="list-group-item"> LAST PRICE: {{ $srchItem->lastPrice }}</li>
                                    </ul>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Button trigger modal for edit item -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editItem{{ $srchItem->id }}">
                              Edit
                            </button>

                            <!-- Modal edit item -->
                            <div class="modal fade" id="editItem{{ $srchItem->id }}" tabindex="-1" role="dialog" aria-labelledby="editItemDetails" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editItemDetails">Edit Item Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form" method="post" action="{{ route('item.update', $srchItem->id) }}">
                                     
                                      @csrf
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row mb-4">
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="text" id="itemName" name="itemName" value="{{ $srchItem->category }}" class="form-control" />
                                                  <label class="form-label" for="itemName">Item Name/Category</label>
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="text" id="brandName" name="brandName" value="{{ $srchItem->brandName }}" class="form-control" />
                                                  <label class="form-label" for="brandName">Brand Name</label>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row mb-4">
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="number" id="price" name="price" value="{{ $srchItem->price }}" class="form-control" />
                                                  <label class="form-label" for="price">Price</label>
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="number" id="lastPrice" name="lastPrice" value="{{ $srchItem->lastPrice }}" class="form-control" />
                                                  <label class="form-label" for="lastPrice">Last Price</label>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row mb-4">
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="number" id="stocks" name="stocks" value="{{ $srchItem->stocks }}" class="form-control" />
                                                  <label class="form-label" for="price">Stocks</label>
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="text" id="lastPrice" name="category" value="{{ $srchItem->category }}" class="form-control" />
                                                  <label class="form-label" for="category">Category</label>
                                                </div>
                                              </div>
                                            </div>

                                          
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection