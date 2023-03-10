@extends('admin2.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bill Update Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Bill Form</li>
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
                    <div class="card-header">
                        <h3 class="card-title">Bill Entry</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('campaign.update', $campaign->uuid) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bill Submission Date <span style="color: red;">*</span> </label>
                                        <div class="input-group date">

                                            <input type="date" class="form-control" name="bill_submission_date"
                                                value="{{ old('bill_submission_date', $campaign->bill_submission_date) }}"
                                                required>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Client Name <span style="color: red;">*</span> </label>
                                        <select class="form-control select2" name="client_id" id="client_id"
                                            style="width: 100%;">
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}"
                                                    {{ $client->id == $campaign->client_id ? 'selected' : '' }}>
                                                    {{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Campaign Name <span style="color: red;">*</span> </label>
                                        <input type="text" class="form-control typeahead" id="title" name="title"
                                            placeholder="Ex: bKash" value="{{ old('title', $campaign->title) }}" required>
                                        @if ($errors->has('title'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Campaign Description <span style="color: red;">*</span> </label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            placeholder="Ex: bKash Electricity Pay Bill Campaign"
                                            value="{{ old('description', $campaign->description) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Year <span style="color: red;">*</span> </label>
                                        <input type="number" class="form-control" name="year" min="2000"
                                            max="2099" step="1" value="{{ old('year', $campaign->year) }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="month" class="form-label">Period <span style="color: red;">*</span>
                                        </label>
                                        <select class="form-control select2" name="month" style="width: 100%;" required>

                                            <option value="1" {{ $campaign->month == 1 ? 'selected' : '' }}>January
                                            </option>
                                            <option value="2" {{ $campaign->month == 2 ? 'selected' : '' }}>February
                                            </option>
                                            <option value="3" {{ $campaign->month == 3 ? 'selected' : '' }}>March
                                            </option>
                                            <option value="4" {{ $campaign->month == 4 ? 'selected' : '' }}>April
                                            </option>
                                            <option value="5" {{ $campaign->month == 5 ? 'selected' : '' }}>May
                                            </option>
                                            <option value="6" {{ $campaign->month == 6 ? 'selected' : '' }}>June
                                            </option>
                                            <option value="7" {{ $campaign->month == 7 ? 'selected' : '' }}>July
                                            </option>
                                            <option value="8" {{ $campaign->month == 8 ? 'selected' : '' }}>August
                                            </option>
                                            <option value="9" {{ $campaign->month == 9 ? 'selected' : '' }}>September
                                            </option>
                                            <option value="10" {{ $campaign->month == 10 ? 'selected' : '' }}>October
                                            </option>
                                            <option value="11" {{ $campaign->month == 11 ? 'selected' : '' }}>November
                                            </option>
                                            <option value="12" {{ $campaign->month == 12 ? 'selected' : '' }}>December
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Estimate Id <span style="color: red;">*</span> </label>
                                        <input type="text" class="form-control" id="estimate_no" name="estimate_no"
                                            placeholder="Ex: PP/DIGIT/419/Web/01012021"
                                            value="{{ old('estimate_no', $campaign->estimate_no) }}" required>
                                        @if ($errors->has('estimate_no'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('estimate_no') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bill Id <span style="color: red;">*</span> </label>
                                        <input type="text" class="form-control" name="bill_no" id="bill_no"
                                            placeholder="Ex: PP/MELON/Web/401/02-21"
                                            value="{{ old('bill_no', $campaign->bill_no) }}" required>
                                    </div>
                                    @if ($errors->has('bill_no'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('bill_no') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <label>Gross <span style="color: red;">*</span> </label>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="number" id="gross" class="form-control" name="gross"
                                                value="{{ old('gross', $campaign->gross) }}" required>
                                            @if ($errors->has('gross'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('gross') }}
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12 col-12">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="last-name-column" class="form-label">Client Commission in
                                                        (%)<i class="fas fa-info-circle"
                                                            title="commission of this client (in %) is %"></i></label>
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="number" id="commissionPerc" class="form-control"
                                                        name="commissionPerc"
                                                        value="{{ old('commissionPerc', $campaign->client_commission_in) }}"
                                                        placeholder="Ex: 10">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group row">
                                                {{-- <div class="col-md-6">
                                                    <label for="last-name-column" class="form-label">Client
                                                        Commission</label>

                                                </div> --}}
                                                <div class="col-md-6">

                                                    <input type="number" id="commission" class="form-control"
                                                        name="commission"
                                                        value="{{ old('commission', $campaign->client_commission) }}"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>


                                <div class="col-md-12 col-12">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="last-name-column" class="form-label">Discount<i
                                                            class="fas fa-info-circle"
                                                            title="commdiscount of this client is"></i></label>
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="number" id="commdiscount" class="form-control"
                                                        name="commdiscount"
                                                        value="{{ old('commdiscount', $campaign->commdiscount) }}"
                                                        placeholder="Ex: 10">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group row">
                                                {{-- <div class="col-md-6">
                                                    <label for="last-name-column" class="form-label">Client
                                                        Commission</label>

                                                </div> --}}
                                                <div class="col-md-6">

                                                    <input type="number" id="discount" class="form-control"
                                                        name="discount"
                                                        value="{{ old('discount', $campaign->discount) }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory row">

                                        <div class="col-md-3">
                                            <label for="first-name-column" class="form-label">Net <i
                                                    class="fas fa-info-circle" title="after calculating commission"></i>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" id="net" class="form-control" name="net"
                                                value="{{ old('net', $campaign->net) }}" readonly>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12 col-12">
                                    <div class="row">
                                        <div class=" col-md-6 form-group mandatory">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="first-name-column" class="form-label">Vat On <i
                                                            class="fas fa-info-circle"
                                                            title="current vat in (%) is {{ $vat['value'] }}%"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="vat_type" class="form-control select3" name="vat_type"
                                                        style="width: 100%;" required>

                                                        {{-- 
                                                        <option value="1"> Gross</option>
                                                        <option value="2"> Net</option>
                                                        <option value="3"> Without Vat</option> --}}

                                                        {{-- {{
                                                                
                                                            }} --}}

                                                        {{-- <option value="1" {{ $campaign->vat_type }}"
                                                            {{ $campaign->vat_type === 1 ? 'selected' : '' }}>
                                                            Gross</option>
                                                        <option value="2" {{ $campaign->vat_type }}"
                                                            {{ $campaign->vat_type === 2 ? 'selected' : '' }}>
                                                            Net</option>
                                                        <option value="3" {{ $campaign->vat_type }}"
                                                            {{ $campaign->vat_type === 3 ? 'selected' : '' }}>
                                                            Without Vat</option> --}}
                                                        <option value="1" {{ $campaign->vat_type }}"
                                                            {{ $campaign->vat_type === 1 ? 'selected' : '' }}>
                                                            Gross</option>
                                                        <option value="2" {{ $campaign->vat_type }}"
                                                            {{ $campaign->vat_type === 2 ? 'selected' : '' }}>
                                                            Net</option>
                                                        <option value="3" {{ $campaign->vat_type }}"
                                                            {{ $campaign->vat_type === 3 ? 'selected' : '' }}>
                                                            Without Vat</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-3 form-group mandatory">
                                            <div class="row"> --}}
                                        {{-- <div class="col-md-6">
                                                    <label for="first-name-column" class="form-label">Vat in % <i
                                                    class="fas fa-info-circle"
                                                    title="current vat in (%) is {{ $vat['value'] }}%"></i> </label>
                                                </div> --}}
                                        <div class="col-md-3">
                                            <input type="number" id="vatd" class="form-control" name="vatd"
                                                value="{{ old('vatd', $campaign->vatd) }}">
                                        </div>
                                        {{-- </div>

                                        </div> --}}
                                        {{--
                                        <div class="form-group mandatory col-md-3">

                                            <div class="row"> --}}
                                        {{-- <div class="col-md-6">
                                                    <label for="first-name-column" class="form-label">Vat <i
                                                    class="fas fa-info-circle"
                                                    title="current vat in (%) is {{ $vat['value'] }}%"></i> </label>
                                                </div> --}}
                                        <div class="col-md-3">
                                            <input type="number" id="vat" class="form-control" name="vat"
                                                value="{{ old('vat', $campaign->vat) }}" readonly>

                                            {{-- {{ dd($campaign->vat) }} --}}
                                        </div>
                                        {{-- </div>
                                        </div> --}}
                                    </div>
                                </div>



                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Bill amount <span
                                                style="color: red;">*</span> </label>
                                        <input type="number" id="bill_amount" class="form-control"
                                            placeholder="final bill amount" name="bill_amount"
                                            value="{{ old('bill_amount', $campaign->bill_amount) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Due</label>
                                        <input type="number" id="due" class="form-control" placeholder=""
                                            name="due" value="{{ old('due', $campaign->due) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Recevied amount</label>
                                        <input type="number" id="received_amount" class="form-control"
                                            name="received_amount"
                                            value="{{ old('received_amount', $campaign->received_amount) }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Cheque Number</label>
                                        <input type="text" id="first-name-column" class="form-control" name="chq_num"
                                            value="{{ old('chq_num', $campaign->chq_num) }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Cheque Amount</label>
                                        <input type="number" id="first-name-column" class="form-control"
                                            name="cheque_amount"
                                            value="{{ old('cheque_amount', $campaign->cheque_amount) }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Cheque Recevied Date:</label>
                                        <div class="input-group date">

                                            <input type="date" id="first-name-column" class="form-control"
                                                name="chq_rec_date"
                                                value="{{ old('chq_rec_date', $campaign->chq_rec_date) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="customFile" class="form-label">Cheque Image (Max Size: <span
                                                style="color: red;">3MB</span>)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="cheque_image" accept="image/jpeg,image/png,image/jpg">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('cheque_image'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('cheque_image') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Remark </label>

                                        <textarea class="form-control" name="remark" value="{{ old('remark') }}" rows="1" cols="10"></textarea>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-footer text-center mx-auto">
                                <button type="submit" class="btn btn-primary text-center mx-auto">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
        </section>

    </div>
@endsection

@section('customJs')
    <script type="text/javascript">
        $("#client_id").change(function() {
            var client_id_path = "{{ route('getCommissionValue') }}";
            var selectedOption = $(this).val();
            $.get(client_id_path, {
                client_id: selectedOption
            }, function(data) {
                $("#commissionPerc").val(data);
            });
        });
    </script>
    <script type="text/javascript">
        var title_path = "{{ route('autocomplete_campaign_name') }}";
        $('#title').typeahead({

            source: function(query, process) {

                return $.get(title_path, {
                    title: query
                }, function(data) {

                    return process(data);

                });

            }

        });
    </script>
    <script type="text/javascript">
        var description_path = "{{ route('autocomplete_campaign_description') }}";
        $('#description').typeahead({

            source: function(query, process) {

                return $.get(description_path, {
                    description: query
                }, function(data) {

                    return process(data);

                });

            }

        });
    </script>
    <script type="text/javascript">
        var estimate_number_path = "{{ route('autocomplete_campaign_estimate_number') }}";
        $('#estimate_no').typeahead({

            source: function(query, process) {

                return $.get(estimate_number_path, {
                    estimate_number: query
                }, function(data) {

                    return process(data);

                });

            }

        });
    </script>
    <script type="text/javascript">
        var bill_number_path = "{{ route('autocomplete_campaign_bill_number') }}";
        $('#bill_no').typeahead({

            source: function(bill_number, process) {

                return $.get(bill_number_path, {
                    bill_number: bill_number
                }, function(data) {

                    return process(data);

                });

            }

        });
    </script>
    <script>
        $(function() {

            $('#gross').on('input', function() {
                calculate();
            });
            $('#commissionPerc').on('input', function() {
                calculate();
            });
            $('#received_amount').on('input', function() {
                calculate();
            });
            $('#vatd').on('input', function() {
                calculate();
            });
            $('#commdiscount').on('input', function() {
                calculate();

            });




            function calculate() {
                var gross = parseInt($('#gross').val());
                var commissionPerc = parseInt($('#commissionPerc').val());
                var perc = "";

                var commdiscount = parseInt($('#commdiscount').val());

                var diss = "";

                // console.log(commdiscount)


                if (isNaN(commissionPerc)) {
                    commissionPerc = 0;
                }

                perc = Math.round(((commissionPerc * gross) / 100));


                if (isNaN(commdiscount)) {
                    commdiscount = 0;
                    // console.log(commdiscount)
                }

                diss = Math.round(((commdiscount * gross) / 100));


                // if(isNaN(gross) || isNaN(commissionPerc)){
                //     perc=" ";
                // }else{
                //     perc = Math.round( ((commissionPerc * gross) / 100));
                // }

                // Prec and commdiscount calculation

                var net = gross - perc - diss;
                // console.log(commdiscount, net, perc);

                // var net = gross - perc;


                var vatPerc = parseInt($('#vatd').val());
                var vat = "";


                var vattype = $("#vat_type").val();

                if (vattype == 1) {
                    vat = Math.round(((vatPerc * gross) / 100));
                    console.log(vat);
                } else if (vattype == 2) {
                    vat = Math.round(((vatPerc * net) / 100));
                    console.log(vat);
                } else if (vattype == 3) {
                    vat = Math.round(((vatPerc * 0) / 100));
                    console.log(vat);
                }

                if (isNaN(vatPerc)) {
                    vatPerc = 0;
                }

                // commdiscount calculation

                // $("#vattype").change(function() {
                //     let val = $(this).val();
                //     if (val == "vatval1") {
                //          vat = Math.round(((vatPerc * gross) / 100));
                //         console.log(vat);
                //     } else if (val == "vatval2") {
                //          vat = Math.round(((vatPerc * net) / 100));
                //         console.log(vat);
                //     } else if (val == "vatval3") {
                //          vat = Math.round(((vatPerc * 0) / 100));
                //         console.log(vat);
                //     }

                // });

                //  vat calculation
                // vat = Math.round(((vatPerc * net) / 100));


                // var bill = parseInt($('#bill_amount').val());

                var bill = 0;

                bill = net + vat;

                var receivedamount = parseInt($('#received_amount').val());
                var due = 0;

                if (isNaN(receivedamount)) {
                    receivedamount = 0;
                }


                due = bill - receivedamount;



                $('#commission').val(perc);
                $('#net').val(net);
                $('#vat').val(vat);
                $('#bill_amount').val(bill);
                $('#due').val(due);
                $('#discount').val(diss);

            }


        });
    </script>
@endsection
