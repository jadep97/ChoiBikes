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
                      @foreach($filter as $filteredItem)
                        <option value="{{ $filteredItem->category }}" >{{ $filteredItem->category }}</option>
                      @endforeach()
                    </select>
                 
                    
                    <!-- select for brands -->

                      <select class="browser-default custom-select" searchable="Search here.." name="brandName" id="brandName">
                         <option value="" disabled selected>Select Brand</option>
                      @foreach($filter as $filteredItem)
                        <option value="{{ $filteredItem->brandName }}" >{{ $filteredItem->brandName }}</option>
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
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @foreach($items as $item)
                        <tr>
                          <td>
                            {{ $item->itemName }}
                          </td>
                          <td>
                            {{ $item->brandName }}
                          </td>
                          <td>
                            {{ $item->category }}
                          </td>
                          <td>
                            <!-- Button trigger modal for delete item -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteItem{{ $item->id }}">
                              Delete
                            </button>

                            <!-- Modal delete item -->
                            <div class="modal fade" id="deleteItem{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="itemDelete" aria-hidden="true">
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
                                      <li class="list-group-item"> ITEM NAME: {{ $item->itemName }}</li>
                                      <li class="list-group-item"> BRAND NAME: {{ $item->brandName }}</li>
                                      <li class="list-group-item"> CATEGORY: {{ $item->category }}</li>
                                      <li class="list-group-item"> STOCKS: {{ $item->stocks }}</li>
                                      <li class="list-group-item"> PRICE: {{ $item->price }}</li>
                                      <li class="list-group-item"> LAST PRICE: {{ $item->lastPrice }}</li>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showItem{{ $item->id }}">
                              View
                            </button>

                            <!-- Modal view item -->
                            <div class="modal fade" id="showItem{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="showItemDetails" aria-hidden="true">
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
                                      <li class="list-group-item"> ITEM NAME: {{ $item->itemName }}</li>
                                      <li class="list-group-item"> BRAND NAME: {{ $item->brandName }}</li>
                                      <li class="list-group-item"> CATEGORY: {{ $item->category }}</li>
                                      <li class="list-group-item"> STOCKS: {{ $item->stocks }}</li>
                                      <li class="list-group-item"> PRICE: {{ $item->price }}</li>
                                      <li class="list-group-item"> LAST PRICE: {{ $item->lastPrice }}</li>
                                    </ul>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                                <!-- Button trigger modal for edit item -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editItem{{ $item->id }}">
                              Edit
                            </button>

                            <!-- Modal edit item -->
                            <div class="modal fade" id="editItem{{ $item->id}}" tabindex="-1" role="dialog" aria-labelledby="editItemDetails" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editItemDetails">Edit Item Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form" method="post" action="{{ route('item.update', $item->id) }}">
                                     
                                      @csrf
                                            <!-- 2 column grid layout with text inputs for the first and last names -->
                                            <div class="row mb-4">
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="text" id="itemName" name="itemName" value="{{ $item->category }}" class="form-control" />
                                                  <label class="form-label" for="itemName">Item Name/Category</label>
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="text" id="brandName" name="brandName" value="{{ $item->brandName }}" class="form-control" />
                                                  <label class="form-label" for="brandName">Brand Name</label>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row mb-4">
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="number" id="price" name="price" value="{{ $item->price }}" class="form-control" />
                                                  <label class="form-label" for="price">Price</label>
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="number" id="lastPrice" name="lastPrice" value="{{ $item->lastPrice }}" class="form-control" />
                                                  <label class="form-label" for="lastPrice">Last Price</label>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row mb-4">
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="number" id="stocks" name="stocks" value="{{ $item->stocks }}" class="form-control" />
                                                  <label class="form-label" for="price">Stocks</label>
                                                </div>
                                              </div>
                                              <div class="col">
                                                <div class="form-outline">
                                                  <input type="text" id="lastPrice" name="category" value="{{ $item->category }}" class="form-control" />
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