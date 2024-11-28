@extends('template')

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3 text-primary">RentalMobil</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="javascript:;" class="text-decoration-none text-dark"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->

<div class="card shadow-sm">
    <div class="card-body p-4">
        <h5 class="card-title text-secondary"><i class="bx bx-add-to-queue me-2"></i>Add New Product</h5>
        <hr class="text-secondary" />
        <div class="form-body mt-4">
            <form action="{{route('car.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded bg-light">
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label fw-bold"><i class="bx bx-rename me-2"></i>Product Title</label>
                                <input type="text" class="form-control" id="inputProductTitle" name="name" placeholder="Enter product title">
                            </div>
                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label fw-bold"><i class="bx bx-detail me-2"></i>Description</label>
                                <textarea class="form-control" id="inputProductDescription" rows="3" name="description" placeholder="Enter product description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image-uploadify" class="form-label fw-bold"><i class="bx bx-image-add me-2"></i>Product Images</label>
                                <input id="image-uploadify" type="file" class="form-control" name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded bg-light">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label fw-bold"><i class="bx bx-dollar me-2"></i>Price</label>
                                    <input type="number" class="form-control" id="inputPrice" name="price" placeholder="1000" min="0">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputStock" class="form-label fw-bold"><i class="bx bx-box me-2"></i>Stock</label>
                                    <input type="number" class="form-control" id="inputStock" name="stock" placeholder="1" min="0">
                                </div>
                                <div class="col-12">
                                    <label for="inputProductType" class="form-label fw-bold"><i class="bx bx-category me-2"></i>Product Type</label>
                                    <select name="category_id" class="form-select" id="inputProductType">
                                        <option disabled selected>Select product type</option>
                                        @foreach($data_category as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputVendor" class="form-label fw-bold"><i class="bx bx-building me-2"></i>plat</label>
                                    <select name="plat_id" class="form-select" id="inputplat">
                                        <option disabled selected>Select plat</option>
                                        @foreach($data_plat as $plat)
                                            <option value="{{$plat->id}}">{{$plat->plat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary"><i class="bx bx-save me-2"></i>Save Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </form>
        </div>
    </div>
</div>



@endsection
