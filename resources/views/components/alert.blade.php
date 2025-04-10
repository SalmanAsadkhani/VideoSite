

<div id="alert" class="position-absolute " style="right: 20rem">
    @if (session('success'))
        <div class="alert alert-success  d-flex justify-content-center me-5">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
       <div class="alert alert-danger">
           {{session('error') }}
       </div>
    @endif

</div>



<script>
    setTimeout(() => {
        document.getElementById("alert").style.opacity = "0";
        setTimeout(() => {
            document.getElementById("alert").remove();
        }, 500);
    }, 2000);
</script>
