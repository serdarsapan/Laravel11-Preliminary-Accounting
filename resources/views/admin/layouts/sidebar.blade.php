<nav
    id="sidebarMenu"
    class="collapse d-lg-block sidebar collapse"
>
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-1">
            <a
                href="{{ route('category.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'category') ? 'active' : ''}}"
                aria-current="true"
            >
                <i class="fas fa-tachometer-alt fa-fw me-3"></i
                ><span>Genel Gider Tipleri</span>
            </a>
            <a
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'user') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Mevcut Kullanıcılar</span>
            </a>
            <a
                href="{{ route('satis.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'satis') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Satış Yönetimi</span>
            </a>
            <a
                href="{{ route('alis.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'alis') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Satın Alma Yönetimi</span>
            </a>
            <a
                href="{{ route('gider.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'gider') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Genel Gider Yönetimi</span>
            </a>
            <a
                href="{{ route('blogs.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'blog') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Ürün ve Hizmetler</span>
            </a>
            <a
                href="{{ route('cari.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'cari') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Cari Hesaplar</span>
            </a>
            <a
                href="{{ route('accounts.index') }}"
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'account') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Finans</span>
            </a>
            <a
                class="list-group-item list-group-item-action py-2 ripple  {{(request()->segment(2) == 'rapor') ? 'active' : ''}}"
            >
                <i class="fas fa-chart-area fa-fw me-3"></i
                ><span>Raporlar</span>
            </a>
        </div>
    </div>
</nav>