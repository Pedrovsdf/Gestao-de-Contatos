<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user(); // Obtém o usuário autenticado
        $status = $request->query('status', 'todos'); // Filtro padrão: 'todos'
        $nome = $request->query('nome', ''); // Filtro por nome (opcional)

        $query = $user->contatos(); // Usa o relacionamento para buscar os contatos do usuário

        // Filtra por status
        if ($status === 'excluido') {
            $query->onlyTrashed(); // Contatos excluídos (soft delete)
        } elseif ($status === 'ativo') {
            $query->where('status', 'ativo'); // Contatos ativos
        } elseif ($status === 'todos') {
            $query->withTrashed(); // Todos os contatos, incluindo excluídos
        }

        // Filtra por nome (se fornecido)
        if (!empty($nome)) {
            $query->where('nome', 'like', $nome . '%');
        }

        $contatos = $query->get(); // Executa a query e retorna os resultados

        return response()->json($contatos);
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $contato = new Contato();
        $contato->nome = $request->nome;
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->observacoes = $request->observacoes;
        $contato->user_id = $user->id; // Garante que o usuário autenticado seja associado
        $contato->save();

        return response()->json(['message' => 'Contato salvo com sucesso'], 201);
    }


    public function show($id)
    {
        $user = auth()->user();
        $contato = Contato::where('id', $id)->where('user_id', $user->id)->first();

        if (!$contato) {
            return response()->json(['error' => 'Contato não encontrado'], 404);
        }

        return response()->json($contato);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email',
            'observacoes' => 'nullable|string',
            'status' => 'nullable|string',  // Certifique-se de validar o status
        ]);

        $contato = Contato::find($id);

        if (!$contato) {
            return response()->json(['error' => 'Contato não encontrado'], 404);
        }

        // Verifica se o status foi alterado para "excluído"
        if ($request->has('status') && $request->status === 'excluido') {
            $contato->delete();
            return response()->json(['message' => 'Contato excluído com sucesso'], 200);
        }

        // Atualiza os campos normalmente
        $contato->nome = $request->nome;
        $contato->telefone = $request->telefone;
        $contato->email = $request->email;
        $contato->observacoes = $request->observacoes;

        // Só atualiza o status se ele foi passado na requisição
        if ($request->has('status')) {
            $contato->status = $request->status;
        }

        $contato->save();

        return response()->json($contato, 200);
    }




    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);

        if ($contato->user_id !== auth()->id()) {
            return response()->json(['error' => 'Acesso não autorizado'], 403);
        }

        $contato->status = 'excluido';
        $contato->save();
        $contato->delete();
        return response()->json(['message' => 'Contato excluído com sucesso'], 200);
    }
}
