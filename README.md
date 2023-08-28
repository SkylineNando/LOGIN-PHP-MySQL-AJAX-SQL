# LOGIN-PHP-MySQL-AJAX-SQL
Creating a login system with different access levels using PHP, MySQL, AJAX and SQL involves several steps. I will break the process down into parts to make it easier to understand and implement. Make sure you are familiar with basic web and database programming concepts before you begin.


Parte 1: Configuração do Banco de Dados

Siga os mesmos passos mencionados na primeira resposta para criar a tabela "usuarios".

Parte 2: Página de Login (index.html)

O HTML e o JavaScript serão os mesmos da primeira resposta.

Parte 3: Script PHP para Login (login.php)

php
Copy code
```yaml
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "seu_usuario", "sua_senha", "sistema_login");
    
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    $query = "SELECT id, password, nivel_acesso FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword, $nivelAcesso);
    
    if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
        $_SESSION['username'] = $username;
        $_SESSION['nivel_acesso'] = $nivelAcesso;
        echo "success";
    } else {
        echo "error";
    }
    
    $stmt->close();
    $conn->close();
}
?>
```
Parte 4: Página de Dashboard (dashboard.php)

A página de dashboard será a mesma que na primeira resposta.

Parte 5: Script PHP para Logout (logout.php)

O script para logout também será o mesmo da primeira resposta.

Resumo das Melhorias:

Uso de Funções de Hash para Senhas: As senhas são armazenadas no banco de dados como hashes usando a função password_hash(), e a verificação é feita usando a função password_verify(). Isso garante que as senhas reais nunca sejam armazenadas e aumenta a segurança.

Consultas Parametrizadas: O uso de consultas parametrizadas no SQL previne ataques de injeção de SQL, garantindo que os dados do usuário sejam tratados com segurança.

Uso de Sessões: O sistema utiliza sessões para manter o estado do usuário logado e o nível de acesso.

Lembre-se de sempre manter seus sistemas atualizados, aplicar medidas de segurança adequadas e considerar o uso de frameworks e bibliotecas de autenticação para evitar reinventar a roda e se beneficiar de soluções bem testadas e confiáveis.

O atributo pattern é usado em elementos <input> em HTML para especificar uma expressão regular (regex) que define um padrão que o valor inserido no campo deve corresponder. No caso específico da expressão regular que você forneceu:
```yaml
pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
```
Essa expressão regular é utilizada para validar senhas que atendam a certos critérios de complexidade. Vamos desmembrá-la:

(?=.*\d): Isso é um lookahead positivo que verifica se há pelo menos um dígito (número) na string.
(?=.*[a-z]): Esse é outro lookahead positivo que verifica se há pelo menos uma letra minúscula na string.
(?=.*[A-Z]): Mais um lookahead positivo, dessa vez para verificar se há pelo menos uma letra maiúscula na string.
.{8,}: Isso verifica se há pelo menos 8 caracteres no total.

Portanto, essa expressão regular garante que a senha inserida contenha pelo menos um dígito, uma letra minúscula, uma letra maiúscula e tenha um comprimento mínimo de 8 caracteres.

É importante observar que, embora essa expressão regular seja uma medida razoável para aumentar a segurança das senhas, não é a única consideração na criação de senhas seguras. Uma política de senhas robusta também pode envolver outros fatores, como evitar palavras comuns, uso de caracteres especiais, evitando informações pessoais, entre outros. Além disso, é crucial que a segurança das senhas seja combinada com práticas adequadas de armazenamento e gerenciamento de senh
