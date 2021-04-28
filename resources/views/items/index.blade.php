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
                      <th class="text-right">
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
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>

                                <!-- Button trigger modal for edit item -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editItem">
                              Edit
                            </button>

                            <!-- Modal edit item -->
                            <div class="modal fade" id="editItem" tabindex="-1" role="dialog" aria-labelledby="editItemDetails" aria-hidden="true">
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


                              <button type="button" class="btn btn-primary" href="{{ route('item.destroy', $item->id) }}">
                              Delete
                            </button>
                          
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