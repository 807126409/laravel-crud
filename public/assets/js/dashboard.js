  $(function () {
    $('#createNewRecord').click(function () {
        $('#saveBtn').val("create-record");
        $('#record_id').val('');
        $('#recordForm').trigger("reset");
        $('#modelHeading').html("Create New Record");
        $('#ajaxModel').modal('show');
    });
    $('body').on('click', '.editRecord', function () {
      var record_id = $(this).data('id');
      $.get("{{ url('tasks/') }}" +'/' + record_id, function (data) {
          $('#modelHeading').html("Edit Record");
          $('#saveBtn').val("edit-record");
          $('#ajaxModel').modal('show');
          $('#record_id').val(data.id);
          $('#type').val(data.type);
          $('#name').val(data.NAME);
          $('#magento_id').val(data.magento_id);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        if($(this).val() == 'edit-record'){
            $.ajax({
                data: $('#recordForm').serialize(),
                url: "{{ url('tasks/') }}"+'/'+$('#record_id').val(),
                type: "PUT",
                dataType: 'json',
                success: function (data) {
                    $.toast('success', 'Record Updated Successfully.');
                    $('#recordForm').trigger("reset");
                    $('#ajaxModel').modal('hide');         
                    $('.row-'+data.id).find('td:eq(0)').html(data.type);     
                    $('.row-'+data.id).find('td:eq(1)').html(data.NAME);     
                    $('.row-'+data.id).find('td:eq(2)').html(data.magento_id);     
                },
                error: function (data) {
                    console.log('Error:', data);
                    $.toast('error', 'Something went wrong!');
                    $('#saveBtn').html('Save Changes');
                }
            });
        }else{
            $.ajax({
                data: $('#recordForm').serialize(),
                url: "{{ route('tasks.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $.toast('success', 'Record Added Successfully.');
                    $('#recordForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    var html = "<tr class='row-'"+data.id+">";
                    html += '<td>'+data.type+'</td>';
                    html += '<td>'+data.name+'</td>';
                    html += '<td>'+data.magento_id+'</td>';
                    html += '<td><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+data.id+'" data-original-title="Edit" class="edit btn btn-primary btn-sm editRecord">Edit</a><a href="javascript:void(0)" data-toggle="tooltip"  data-id="'+data.id+'" data-original-title="Delete" class="btn btn-danger btn-sm deleteRecord">Delete</a></td>';
                    html += "</tr>";
                    $('.record-table-body').append(html);
                },
                error: function (data) {
                    console.log('Error:', data);
                    $.toast('error', 'Something went wrong!.');
                    $('#saveBtn').html('Save Changes');
                }
            });
        }
    });
    
    $('body').on('click', '.deleteRecord', function () {
        var buttonObject = $(this); 
        var record_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            data:{
                "_token": "{{ csrf_token() }}"
            },
            url: "{{ url('tasks') }}"+'/'+record_id,
            success: function (data) {
                $.toast('success', 'Record deleted Successfully.');
                $(this).remove();
            },
            error: function (data) {
                $.toast('error', 'Something went wrong!.');
                console.log('Error:', data);
            }
        });
    });
     
  });
  (function(window, $){


  var defaultConfig = {
    type: '',
    autoDismiss: false,
    container: '#toasts',
    autoDismissDelay: 4000,
    transitionDuration: 500
  };

  $.toast = function(config){
    var size = arguments.length;
    var isString = typeof(config) === 'string';
    
    if(isString && size === 1){
      config = {
        message: config
      };
    }

    if(isString && size === 2){
      config = {
        message: arguments[1],
        type: arguments[0]
      };
    }
    
    return new toast(config);
  };

  var toast = function(config){
    config = $.extend({}, defaultConfig, config);
    // show "x" or not
    var close = config.autoDismiss ? '' : '&times;';
    
    // toast template
    var toast = $([
      '<div class="toast ' + config.type + '">',
      '<p>' + config.message + '</p>',
      '<div class="close">' + close + '</div>',
      '</div>'
    ].join(''));
    
    // handle dismiss
    toast.find('.close').on('click', function(){
      var toast = $(this).parent();

      toast.addClass('hide');

      setTimeout(function(){
        toast.remove();
      }, config.transitionDuration);
    });
    
    // append toast to toasts container
    $(config.container).append(toast);
    
    // transition in
    setTimeout(function(){
      toast.addClass('show');
    }, config.transitionDuration);

    // if auto-dismiss, start counting
    if(config.autoDismiss){
      setTimeout(function(){
        toast.find('.close').click();
      }, config.autoDismissDelay);
    }

    return this;
  };
  
})(window, jQuery);
$(document).ready(function() {
  $('select.changeStatus').change(function(){
    // You can access the value of your select field using the .val() method
    alert('Select field value has changed to' + $('select.changeStatus').val());
   // You can perform an ajax request using the .ajax() method
   $.ajax({
       type: 'GET',
      url: 'changeStatus.php', // This is the url that will be requested
      // This is an object of values that will be passed as GET variables and 
      // available inside changeStatus.php as $_GET['selectFieldValue'] etc...
      data: {selectFieldValue: $('select.changeStatus').val()},
      // This is what to do once a successful request has been completed - if 
      // you want to do nothing then simply don't include it. But I suggest you 
      // add something so that your use knows the db has been updated
      success: function(html){ Do something with the response },
      dataType: 'html'
    });

});