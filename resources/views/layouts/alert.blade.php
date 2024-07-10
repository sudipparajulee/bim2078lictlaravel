@if(Session::has('success'))
<div class="fixed left-4 bottom-4 bg-indigo-50 px-7 py-3 rounded-lg shadow-lg border-l-8 border-indigo-600 z-20" id="alertmessage">
    <p class="text-indigo-500 text-center text-xl font-bold"><i class="ri-check-double-line text-3xl"></i>
        <br> {{session('success')}} </p>
</div>

<script>
    setTimeout(function(){
        document.getElementById('alertmessage').style.display = 'none';
    },2000);

</script>
@endif
