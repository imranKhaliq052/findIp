<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!-- need these classes with row to make table full width -->
    <div class="row content-row menuDisplayed sub-header-descr" id="div-collection">
        <div class="col-sm-12">
            @if (Session::has('success'))
                <div class="alert alert-primary">{{ Session::get('success') }} @php  Session::forget('success');   @endphp </div>
            @endif
            <h1 class="mt-4" style="text-align:center;"><b> Site IP </b></h1><br><br><br>
            <div class="table-responsive ">
                <table class="table table-striped table-bordered dt-responsive nowrap no-footer" id="allSites"
                    style="width:100%;">
                    <div>

                        <thead>
                            <tr class="table-primary">
                                <th>Site Name</th>
                                <th>Site Ip</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allowedRequests as $allowedRequest)
                                <tr>
                                    <td class="name" data-id1="{{ $allowedRequest->id }}">{{ $allowedRequest->site_name }}
                                    </td>
                                    <td class="email" data-id2="{{ $allowedRequest->id }}">{{ $allowedRequest->site_ip }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#allSites').DataTable({
                responsive: true,
                dom: 'Blfrtip',
                buttons: [{
                        extend: 'colvis',
                        collectionLayout: 'fixed two-column'
                    },
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <script>
        // this code is used to make table full width'
        $('table.table').css('width', newW);
        $('div.dataTables_scroll').css('width', newW);
        $('#tbl-pieces_wrapper div.row').css('margin-left',
        '0px'); //this simply overcomes an enclosing margin of -15 (something from bootstrap)
    </script>
</x-app-layout>
