<div class="card mb-4">
    <div class="card-header">Ara</div>
    <div class="card-body">
        <div class="input-group">
            <form action="{{ url('searchresult') }}" method="get">
                @csrf
            <input class="form-control" type="text" name="searchTerm" placeholder="Arama Terimi Giriniz..." aria-label="Enter search term..." aria-describedby="button-search" />
            <button class="btn btn-primary" id="button-search" type="submit">Ara!aa</button>asdasd
            </form>adsa
        </div>
    </div>
</div>