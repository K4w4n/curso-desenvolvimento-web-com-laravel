<h1>Hello word view</h1>
<p>
    {{ 'This is a blade code' }}
</p>
{{-- This is a comment --}}

@php
/* This is a comment */
echo 'This is a php code';

@endphp

@isset($fornecedores)
    @forelse($fornecedores as $indice => $fornecedor)
        {{--@dd($loop);--}}
        <hr/>
        <ul class="fornecedor">
        
            <li class="data">
                <span class = "data-name">Quantidade</span>:
                <span class = "data-value">{{$loop->count}}</span>
            </li>
        
            <li class="data">
                <span class = "data-name">Number</span>:
                <span class = "data-value">{{$loop->iteration}}</span>
            </li>
        
            <li class="data">
                <span class = "data-name">First</span>:
                <span class = "data-value">{{$loop->first ? 'yes' : 'No'}}</span>
            </li>
        
            <li class="data">
                <span class = "data-name">First</span>:
                <span class = "data-value">{{$loop->last ? 'yes' : 'No'}}</span>
            </li>

            <li class="data">
                <span class = "data-name">Name</span>:
                <span class = "data-value">{{$fornecedor['name'] ?? 'Ghost'}}</span>
            </li>

            <li class="data">
                <span class = "data-name">Status</span>:
                <span class = "data-value">{{$fornecedor['status'] ?? 'Desconhecido'}}</span>
            </li>
            
            <li class="data">
                <span class = "data-name">DDD</span>:
                <span class = "data-value">{{$fornecedor['ddd'] ?? 'Desconhecido'}}</span>
            </li>
            
            <li class="data">
                <span class = "data-name">Telefone</span>:
                <span class = "data-value">{{$fornecedor['telefone'] ?? 'Desconhecido'}}</span>
            </li>
            
            <li class="data">
                <span class = "data-name">Starts</span>:
                <span class = "data-value">
                    @php $y = 0; @endphp

                    @while($y < $fornecedor['starts'])
                        x
                        @php $y++; @endphp
                    @endwhile
                </span>
            </li>
            
            @if(!empty($fornecedor['ddd']))
                <li class="data">
                    <span class = "data-name">Cidade</span>:
                    <span class = "data-value">
                            @switch($fornecedor['ddd'])

                                @case('11')
                                    São Paulo - SP
                                    @break

                                @case('85')
                                    Fortaleza - CE
                                    @break

                                @case('32')
                                    Juiz de fora - MG
                                    @break
                                @default
                                    Cidade não encontrada
                            @endswitch
                    </span>
                </li>
            @else
                He live in Ghost City
            @endif

        </ul>

        <hr/>
    @empty
        Não existem fornecedores cadastrados 
    @endforelse
@endisset