<div class="list-group sidebar">
    <a href="/street" class="list-group-item list-group-item-action">
        Street
    </a>
    <a href="/township" class="list-group-item list-group-item-action">Township</a>
    <a href="/address" class="list-group-item list-group-item-action">Address</a>
    <a href="/nationality" class="list-group-item list-group-item-action">Nationality</a>
    <a href="/race/" class="list-group-item list-group-item-action">Race</a>
    <a href="/type/" class="list-group-item list-group-item-action">Client Type</a>
    <a href="/job_type/" class="list-group-item list-group-item-action">Job Type</a>
    <a href="/job_specification/" class="list-group-item list-group-item-action">Job Specification</a>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
        var current = location.pathname;
        $('.sidebar a').each(function () {
            var $this = $(this);
            if($this.attr('href').indexOf(current) !== -1){
                $this.addClass('active');
            }
        });
    });
</script>
@endpush