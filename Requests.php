<?php


class Requests
{
    const POST = 'POST';
    const GET = 'GET';
    /**
     * faz requisição para endpoint Rest com conteudo json
     * 
     * @param string $url url do endpoint
     * 
     * @param string $metodo metodo GET|POST
     * 
     * @param array $data dados para serem enviados
     * 
     * @return false|string false em caso de falha e uma string com o retorno em caso de sucesso
     */
    public static function send(string $url, string $metodo, array $data):false|string
    {
        if($metodo != self::GET && $metodo != self::POST)
            return false;
		
		$json_data = json_encode($data);
		
		if($json_data === null)
			return false;
		
        // Configuração do contexto HTTP
        $options = [
            "http" => [
                "header"  => "Content-Type: application/json\r\n",
                "method"  => $metodo,
                "content" => $json_data,
            ],
        ];

        if(!$context = stream_context_create($options))
            return false;

        // Envia a requisição
        return file_get_contents($url, false, $context);
    }
}

?>