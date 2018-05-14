@extends('layouts.app')

@section('content')
<h2 class="app-heading">Моят бележник</h2>
<div class="row">
    <div class="col-md-3">
        <a href="{{ route('tasks.create') }}" class="p-2 btn btn-primary btn-block"><i class="fas fa-plus"></i> Добави</a>
    </div>
</div>

<div class="row">
    <div class="col-md-10 mx-auto">
        <div id="calendar"></div>
        <div class="mt-2" id="tips"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function getMonth() { 
            var date = new Date($('#calendar').fullCalendar('getDate'));
            var monthInt = date.getMonth();
            return monthInt + 1; 
        }

        $('#calendar').fullCalendar({
            locale: 'bg',
            events: '/tasks',
            viewRender: function(view, element) {
                $.ajax({
                type: 'get',
                url: '/user/tips',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {id: getMonth()},
                success: function(data) {
                    $('#tips').empty();
                    var $container = $('<div>')
                    if (data.length > 0) {
                        $.each(data, function(i, v) {
                            var $p = $('<p>');
                            $p.html(v.body);
                            $p.addClass('bg-success rounded text-white p-2');
                            $container.append($p);
                        });
                    } else {
                        $p = $('<p>').html('Все още няма съвети за този месец!');
                        $p.addClass('alert alert-info');
                        $container.append($p);
                    }
                    $('#tips').append($container);
                }
                });
               
            } 

        });
    });

</script>
@endsection