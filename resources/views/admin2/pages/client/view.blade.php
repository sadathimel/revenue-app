@extends('admin2.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Client Information Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Client</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header row justify-content-between">

                        <div class="col-md-6">
                            <h3 class="card-title "> <b>{{ $client->name }}</b> All Information</h3>

                        </div>

                        <div class="col-md-6 ">
                            <button type="button" class="btn btn-primary"
                                onclick="location.href='{{ url('clients') }}'">Client Lists</button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <form class="form" method="POST" action="{{ route('client.update', $client->uuid) }}"
                            data-parsley-validate>
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Client Type</label>
                                        <select disabled class="form-control" name="client_type_id" id="client_type_id"
                                            {{ old('client_type_id', $client->client_type_id) }} style="width: 100%;">
                                            @foreach ($client_types as $client_type)
                                                <option value="{{ $client_type->id }}">{{ $client_type->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group mandatory">
                                        <label for="name" class="form-label">Client Name</label>
                                        <input disabled type="text" id="name" class="form-control" name="name"
                                            placeholder="Ex: Analyzen Bangladesh Limited"
                                            value="{{ old('name', $client->name) }}" data-parsley-required="true" required>
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Client Email</label>
                                        <input disabled type="email" id="email" class="form-control" name="email"
                                            value="{{ old('email', $client->email) }}" placeholder="Ex: example@gmail.com">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Client Phone/Mobile Number</label>
                                        <input disabled type="number" id="phone" class="form-control" name="phone"
                                            placeholder="Ex: 01xxxxxx" value="{{ old('phone', $client->phone) }}"
                                            @error('phone') is-invalid @enderror>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="address" class="form-label">Client Address</label>
                                        <input disabled type="text" id="address" class="form-control" name="address"
                                            placeholder="Ex: Level 1, House , Road No., Gulshan 1, Dhaka 1212"
                                            value="{{ old('address', $client->address) }}">
                                        @if ($errors->has('address'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="client_image" class="form-label">Client Logo (Max Size: <span
                                                style="color: red;">3MB</span>)</label>
                                        <div class="custom-file">
                                            <input disabled type="file" class="custom-file-input" id="customFile"
                                                name="client_image" accept="image/jpeg,image/png,image/jpg">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        @if ($errors->has('client_image'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('client_image') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="commission" class="form-label">Client Commission</label>
                                        <input disabled type="number" step="any" id="commission" class="form-control"
                                            name="commission" placeholder="Ex: 0 (in %)"
                                            value="{{ old('commission', $client->commission) ?? '0.00' }}"
                                            @error('commission') is-invalid @enderror">
                                        @error('commission')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="note" class="form-label">Write a note</label>
                                        <textarea disabled class="form-control" name="note" value="{{ old('note', $client->note) }}" rows="1"
                                            cols="10"></textarea>
                                        @if ($errors->has('note'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('note') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label style="padding-right: 5px;">Vat On: </label>
                                        <div class="form-check form-check-inline">
                                            <input disabled class="form-check-input" type="radio" name="vat_on"
                                                id="exampleRadios1" value="1"
                                                {{ old('vat_on', $client->vat_on_status) == 1 ? 'checked' : '' }}
                                                onclick="showCollapse()">
                                            <label class="form-check-label" for="exampleRadios1">Gross</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input disabled class="form-check-input" type="radio" name="vat_on"
                                                id="exampleRadios2" value="2"
                                                {{ old('vat_on', $client->vat_on_status) == 2 ? 'checked' : '' }}
                                                onclick="hideCollapse()">
                                            <label class="form-check-label" for="exampleRadios2">Net</label>
                                        </div>
                                    </div>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input disabled
                                                        class="custom-control-input custom-control-input-danger"
                                                        type="checkbox" id="clientCommission"
                                                        name="client_commission_status" value="1"
                                                        {{ old('client_commission_status', $client->client_commission_status) == 1 ? 'checked' : '' }}>
                                                    <label for="clientCommission" class="custom-control-label">Client
                                                        Commission</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input disabled
                                                        class="custom-control-input custom-control-input-danger"
                                                        type="checkbox" id="discount" name="discount_status"
                                                        value="2"
                                                        {{ old('discount_status', $client->discount_status) == 2 ? 'checked' : '' }}>
                                                    <label for="discount" class="custom-control-label">Discount</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form> --}}
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $client->id }}</td>
                                        <th>Client Type</th>
                                        <td>{{ $client->clientType->title }}</td>
                                    </tr>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $client->name }}</td>
                                        <th>Commission(%)</th>
                                        <td>{{ $client->commission }}</td>

                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $client->email }}</td>
                                        <th>Phone</th>
                                        <td>{{ $client->phone }}</td>

                                    </tr>
                                    <tr>
                                        <th>Client Address</th>
                                        <td>{{ $client->address }}</td>
                                        <th>Note</th>
                                        <td>{{ $client->note }}</td>

                                    </tr>
                                    <tr>
                                        <th>Client Logo</th>
                                        <td>{{ $client->logo }}</td>
                                        <th>Vat on</th>
                                        <td>{{ $client->vat_on_status == 1 ? 'Gross' : 'Net' }}</td>
                                    </tr>
                                    <tr>
                                        @if ($client->vat_on_status == 1)
                                            <th>Client Commission</th>
                                            <td>{{ $client->client_commission_status == 1 ? 'Yes' : 'No' }}</td>
                                            <th>Discount</th>
                                            <td>{{ $client->discount_status == 2 ? 'Yes' : 'No' }}</td>
                                        @endif

                                    </tr>


                                </thead>
                                <tbody>

                                    <tr>


                                    </tr>



                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
        </section>

    </div>
@endsection

@section('customJs')
    <script>
        function ClientList() {
            // window.location = "{{ route('client.lists') }}"
        }
        // function hideCollapse() {
        //     document.getElementById("collapseExample").classList.remove("show");
        //     document.getElementById("discount").checked = false;
        //     document.getElementById("clientCommission").checked = false;
        // }
    </script>
@endsection
