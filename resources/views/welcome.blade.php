<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Calendar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Customize datepicker container size */
        .datepicker-dropdown {
            max-width: 800px;
        }

        /* Customize datepicker header */
        .datepicker-days .datepicker-switch {
            font-size: 2.5rem;
        }

        /* Customize datepicker table */
        .datepicker table {
            width: 100%;
        }

        /* Customize datepicker table headers */
        .datepicker th {
            font-size: 1.8rem;
        }

        /* Customize datepicker cells */
        .datepicker table td,
        .datepicker table th {
            padding: 1.5rem;
            font-size: 1.5rem;
        }

        /* Customize today's date cell */
        .datepicker-days .today {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <form action="{{ route('save.data.todo') }}" method="post">
        @csrf
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="mb-4">Select a Date</h2>
                    <div class="input-group">
                        <input type="text" id="datepicker" name="dt" class="form-control"
                            placeholder="Select a date" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary" id="openModal" disabled>Open Text
                                Box</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Text Box</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="ts" id="textBox" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-body">
                        @if ($lists->isEmpty())
                            <center>Nothing to show</center>
                        @else
                            <table class="table">
                                <tbody>
                                    @foreach ($lists as $key => $list)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $list->date }}</td>
                                            <td>{{ $list->task }}</td>
                                            <td>
                                                <a href="{{ route('delete.data.todo', $list->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize datepicker
            $('#datepicker').datepicker({
                format: 'mm/dd/yyyy',
                autoclose: true
            }).on('changeDate', function() {
                // Enable button when date is selected
                $('#openModal').prop('disabled', false);
            });

            // Event listener for opening modal
            $('#openModal').click(function() {
                $('#myModal').modal('show');
            });

            // Prevent modal from opening and form from submitting until a date is selected
            $('#openModal').on('click', function(event) {
                if ($('#datepicker').val() === '') {
                    event.preventDefault();
                }
            });
        });
    </script>


</body>

</html>
