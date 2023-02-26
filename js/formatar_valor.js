function formatarValor(input) {
  const valor = Number(input.value.replace(',', '.'));
  input.value = valor.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}
