<div>
    <select wire:model="filterCity" placeholder="Filter by city">
        <option value="">All Cities</option>
        @foreach ($cities as $city)
            <option value="{{ $city->name }}">{{ $city->name }}</option>
        @endforeach
    </select>
    <input type="text" wire:model="searchCity" placeholder="Search city">
    <section class="showCompanies">
        @if ($find)
            <section class="viaCompany">
                <a href="{{ route('company.index') }}">Ver Todas</a>
            </section><br>
            <table>
                <thead>
                    <tr>
                        <th>Nit</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companyFind as $company)
                        <tr>
                            <td>{{ $company->nit }}</td>
                            <td>{{ $company->business_name }}</td>
                            <td>
                                <form action="{{ route('recruiter.joinCompany', ['company' => $company->id]) }}"
                                    method="get">
                                    <button>Vincularse</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nit</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($allCompanies as $company)
                        <tr>
                            <td>{{ $company->nit }}</td>
                            <td>{{ $company->business_name }}</td>
                            <td>
                                <form action="{{ route('recruiter.joinCompany', ['company' => $company->id]) }}"
                                    method="get">
                                    <button>Vincularse</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No hay empresas para mostrar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        @endif
    </section>
</div>
