# Estacionamento
Trabalho para a disciplina de Desenvolvimento Web II desenvolvido em PHP.

**Suas finalidades eram:**

Você deve implementar um sistema web para gestão de um estacionamento.
- O sistema deve iniciar com uma tela de login para o funcionário do estacionamento, com username e senha. Após o funcionário fazer login, este deve ser encaminhado para a tela inicial do sistema (home).
- A tela inicial contém um formulário com um campo para o funcionário inserir a placa do veículo, e um botão de logout. Além disso, o cabeçalho e rodapé, sendo estes devem estar presentes em todas as páginas.
- Quando o veículo entra no estacionamento, o funcionário observa sua placa e insere a mesma no formulário. Caso a placa não esteja cadastrada no banco de dados, este cadastro deve ser realizado a partir da placa do veículo, juntamente com a marca, modelo, e sua cor. Este cadastro deve ser feito em uma nova tela ou em um modal. -- -- Assim que completado o cadastro, já deve ser registrada a entrada do carro no estacionamento. 
- Para a saída do veículo, o funcionário também deve entrar com a placa na tela inicial, sendo que o sistema deve identificar automaticamente se o carro está entrando no estacionamento ou saindo dele. A hora de entrada e saída é gerada automaticamente, correspondendo ao momento em que a placa é submetida no formulário da tela inicial.
- Quando o veículo entra, o sistema deve mostrar na tela a placa do veículo, marca, modelo, cor, a hora que ele entrou. De maneira semelhante, quando o veículo estiver de saída, o sistema deve mostrar a placa do veículo, marca, modelo, cor, a hora que ele entrou, a hora que saiu e o valor a ser pago (R$5.50 por hora). Após deve ser possível voltar para a home.
A tela de ocupação deve mostrar os veículos que estão/estiveram no estacionamento no dia atual, ordenados pela hora de entrada.

Casos de Teste
- Realizar login
o usuário deve realizar o login, sendo que não é permitido submeter o formulário com algum campo vazio.
controle de sessão incluído.

- Registrar entrada de um carro não cadastrado
cadastrar o carro no sistema do estacionamento.
a entrada de um carro deve ser registrada no banco de dados e as informações sobre a operação (ver especificação) devem ser mostradas.

- Registrar entrada de um carro já cadastrado
a entrada de um carro deve ser registrada no banco de dados e as informações sobre a operação (ver especificação) devem ser mostradas.

- Registrar saída de um carro
a saída de um carro deve ser registrada no banco e as informações mostradas como na entrada, incluindo a hora de saída e o valor total. 

- Ver ocupação do dia 
mostrar os veículos que estão/estiveram no estacionamento no dia atual, ordenados pela hora de entrada.

- Logout
destruir sessão e voltar para o login.

