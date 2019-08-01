<from action="{{route('employee-data')}}" method="post">
    <?php echo csrf_field()?>
    <input type="text" name="Name" placeholder="Your Name">
    <select name="District" id="">
        <option value="">Dhaka</option>
        <option value="">Chittagong</option>
        <option value="">Rajshahi</option>
    </select>

    <input  type = "submit" name="btm">

</from>