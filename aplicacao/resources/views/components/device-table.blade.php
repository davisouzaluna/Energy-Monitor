<h3>Dispositivos cadastrados:</h3>
    <div class="grid grid-cols-3 gap-4">
            <table class="table flex justify-center">
                <thead>
                    <!-- Cabeçalho da tabela -->
                </thead>
                <tbody>
                    @php
                        $colCount = 0;
                    @endphp

                    @foreach ($dispositivos as $dispositivo)
                       
                        <td>
                            <form action="{{ route('device.edit', $dispositivo->id) }}" method="GET"
                                style="display: inline;">
                                @csrf
                                <div class="flex items-center">
                                    <button type="submit" class="btn btn-success">
                                        <div class="flex items-center">
                                            <img src="/img/eletrodomestico.png" alt="Imagem do dispositivo"
                                                width="100" height="100" style="max-width: 80px; height: auto;">
                                            <span class="ml-2">{{ $dispositivo->nome }}</span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </td>

                        @php
                            $colCount++;
                            if ($colCount === 3) {
                                $colCount = 0;
                                echo '</tr>';
                            }
                        @endphp
                    @endforeach

                    @if ($colCount !== 0)
                        @php
                            $remainingCols = 3 - $colCount;
                        @endphp

                        @while ($remainingCols > 0)
                            <td></td>
                            @php
                                $remainingCols--;
                            @endphp
                        @endwhile

                        </tr>
                    @endif
                </tbody>
            </table>
    </div>