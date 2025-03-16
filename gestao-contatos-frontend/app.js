const API_URL = 'http://localhost:8000/api';
let token = localStorage.getItem('token');


// Função para verificar se o usuário está autenticado
window.onload = async function() {
    document.getElementById('auth-section').style.display = 'none';  // Esconde a tela de login enquanto verifica o token
    document.getElementById('contatos-section').style.display = 'none'; // Esconde a tela de contatos enquanto verifica

    // Verifica se o token existe ao carregar a página
    if (token) {
        await mostrarContatos(); // Se o token existe, carrega os contatos
    } else {
        // Caso não tenha token, exibe a tela de login
        document.getElementById('auth-section').style.display = 'block';
    }
};

// Função de login
document.getElementById('login-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch(`${API_URL}/login`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password }),
    });

    if (response.ok) {
        const data = await response.json();
        token = data.token;
        const user_id = data.user.id;
        localStorage.setItem('token', token);
        localStorage.setItem('user_id', user_id);
        console.log('Login bem-sucedido. Chamando mostrarContatos...');
        mostrarContatos();
    } else {
        alert('Credenciais inválidas');
    }
});

// Função para se registrar
document.getElementById('register-form').addEventListener('submit', async (e) => {
    e.preventDefault(); // Impede o envio tradicional do formulário

    const name = document.getElementById('name').value;
    const email = document.getElementById('email-register').value;
    const password = document.getElementById('password-register').value;

    try {
        const response = await fetch(`${API_URL}/register`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, email, password }),
        });

        if (response.ok) {
            alert('Usuário registrado com sucesso! Faça login.');
            showLoginForm(); // Alterna para o formulário de login
        } else {
            const errorData = await response.json();
            alert(`Erro ao registrar: ${errorData.message || 'Erro desconhecido'}`);
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        alert('Erro ao conectar ao servidor.');
    }
});

// Funções para alternar entre login e registro
function showRegisterForm() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
}

function showLoginForm() {
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
}

// Funções de Contatos
async function mostrarContatos() {
    // Obtém os valores dos filtros: status e nome
    const status = document.getElementById('filtro-status').value;  // Filtro de status
    const nome = document.getElementById('busca-nome').value;  // Filtro por nome

    try {
        // Envia os parâmetros de filtro para a URL da API
        const response = await fetch(`${API_URL}/contatos?status=${status}&nome=${encodeURIComponent(nome)}`, {
            headers: { 'Authorization': `Bearer ${token}` },
        });

        // Verifica se a requisição foi bem-sucedida
        if (!response.ok) {
            throw new Error(`Erro ao carregar contatos: ${response.statusText}`);
        }

        const contatos = await response.json();
        const tabela = document.getElementById('tabela-contatos');

        // Limpar a tabela antes de adicionar os novos dados
        tabela.innerHTML = '';

        // Verifica se há contatos para exibir
        if (contatos.length > 0) {
            // Preenche a tabela com os contatos filtrados
            tabela.innerHTML = contatos.map(contato => `
                <tr>
                    <td>${contato.nome}</td>
                    <td>${contato.telefone}</td>
                    <td>${contato.email}</td>
                    <td>${contato.status}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" onclick="editarContato(${contato.id})">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="excluirContato(${contato.id})">Excluir</button>
                    </td>
                </tr>
            `).join('');
        } else {
            // Exibe uma mensagem caso nenhum contato seja encontrado
            tabela.innerHTML = '<tr><td colspan="5">Nenhum contato encontrado.</td></tr>';
        }

        // Exibe a seção de contatos e oculta a seção de login
        document.getElementById('auth-section').style.display = 'none';
        document.getElementById('contatos-section').style.display = 'block';
    } catch (error) {
        console.error('Erro ao carregar contatos:', error);
        alert('Erro ao carregar contatos. Verifique o console para mais detalhes.');
    }
}



function abrirFormularioContato(contato = null) {
    const modal = new bootstrap.Modal(document.getElementById('modal-contato'));
    if (contato) {
        document.getElementById('contato-id').value = contato.id;
        document.getElementById('nome').value = contato.nome;
        document.getElementById('telefone').value = contato.telefone;
        document.getElementById('email-contato').value = contato.email;
        document.getElementById('observacoes').value = contato.observacoes;
    } else {
        document.getElementById('form-contato').reset();
    }
    modal.show();
}


async function salvarContato() {
    const token = localStorage.getItem('token');
    const contatoId = document.getElementById('contato-id').value;
    const contato = {
        nome: document.getElementById('nome').value,
        telefone: document.getElementById('telefone').value,
        email: document.getElementById('email-contato').value,
        observacoes: document.getElementById('observacoes').value,
    };

    console.log('Dados do contato a serem enviados:', contato);

    // Valida se todos os campos obrigatórios estão preenchidos
    if (!contato.nome || !contato.telefone || !contato.email) {
        alert('Preencha todos os campos obrigatórios');
        return;
    }

    const url = contatoId ? `${API_URL}/contatos/${contatoId}` : `${API_URL}/contatos`;
    const method = contatoId ? 'PUT' : 'POST';

    try {
        const response = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`,
            },
            body: JSON.stringify(contato),
        });

        if (response.ok) {
            mostrarContatos();
        } else {
            const errorData = await response.json();
            console.error('Erro ao salvar contato:', errorData);  // Log do erro no console
            alert('Erro ao salvar contato: ' + (errorData.message || 'Erro desconhecido'));
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        alert('Erro na comunicação com o servidor');
    }
}



// Função para editar o contato
async function editarContato(id) {
    const response = await fetch(`${API_URL}/contatos/${id}`, {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`,
        },
    });

    if (response.ok) {
        const contato = await response.json();
        abrirFormularioContato(contato);  // Abre o formulário e preenche com os dados
    } else {
        alert('Erro ao carregar contato para edição');
    }
}


// Função para excluir contato
async function excluirContato(id) {
    try {
        const response = await fetch(`${API_URL}/contatos/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`,
            },
            body: JSON.stringify({ status: 'excluido' }),
        });

        if (!response.ok) {
            throw new Error(`Erro ao excluir contato: ${response.statusText}`);
        }

        mostrarContatos(); // Atualiza a lista de contatos
    } catch (error) {
        console.error('Erro ao excluir contato:', error);
        alert('Erro ao excluir contato. Verifique o console para mais detalhes.');
    }
}

// Função para exportar os contatos para CSV
async function exportarContatos() {
    try {
        const status = document.getElementById('filtro-status').value;
        const nome = document.getElementById('busca-nome').value;

        const response = await fetch(`${API_URL}/contatos/exportar?status=${status}&nome=${encodeURIComponent(nome)}`, {
            method: 'GET',
            headers: { 'Authorization': `Bearer ${token}` },
        });

        if (response.ok) {
            const blob = await response.blob();
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'contatos.csv';  // Nome do arquivo CSV
            link.click();
            URL.revokeObjectURL(url);
        } else {
            const errorData = await response.json();
            alert(`Erro ao exportar contatos: ${errorData.message || 'Erro desconhecido'}`);
        }
    } catch (error) {
        console.error('Erro ao exportar contatos:', error);
        alert('Erro ao exportar contatos. Verifique o console para mais detalhes.');
    }
}



document.getElementById('logout').addEventListener('click', () => {
    // Remove o token
    localStorage.removeItem('token');

    // Esconde a seção de contatos e exibe a seção de login
    document.getElementById('contatos-section').style.display = 'none';
    document.getElementById('auth-section').style.display = 'block';

    // Redireciona para a tela de login sem recarregar a página
    // Simula um "reset" da página, sem recarregá-la
    document.getElementById('email').value = '';
    document.getElementById('password').value = '';
    // Limpa os campos de login
});


