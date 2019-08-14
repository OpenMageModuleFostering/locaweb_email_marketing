<?php

class Locaweb_EmailMarketing_Adminhtml_EmailMarketingController extends Mage_Adminhtml_Controller_Action
{	
	
	const USP = '/';
	private $_url = "https://emailmarketing.locaweb.com.br/api/v1";
	private $_apiKey;
    private $_command;
    private $_subCommand;
    private $_params;
	private $_data;
	
    public function indexAction()
    {
	   $this->loadLayout();
		
	   if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta') == ''){
			$block = $this->getLayout()
			->createBlock('adminhtml/template', 'locaweb-block')
			->setTemplate('EmailMarketing/EmailMarketing.phtml');
	   }else{
	   
			$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
			$this->_subCommand = 'lists';            
			$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
			$dadosListas = $this->call();
									
			$block = $this->getLayout()
			->createBlock('adminhtml/template', 'locaweb-block')
			->setTemplate('EmailMarketing/EmailMarketingContaVerificada.phtml');
		
			if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_4') != ''){			
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'contact_imports/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_4');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$dadosExportacoes = $this->call();
				
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'lists/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_lista_exportacao_4');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$listaExportacao = $this->call();
								
				if (isset($dadosExportacoes['id']) && isset($listaExportacao)){
					$dadosExportacao4 = array('data' => $dadosExportacoes['created_at'], 'quantidade' => $dadosExportacoes['total_lines'], 'nome_lista' => $listaExportacao['name'], 'status' => $dadosExportacoes['status']);
					$block->assign('dadosExportacao4', $dadosExportacao4);
				}
			}
			if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_3') != ''){			
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'contact_imports/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_3');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$dadosExportacoes = $this->call();
				
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'lists/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_lista_exportacao_3');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$listaExportacao = $this->call();
								
				if (isset($dadosExportacoes['id']) && isset($listaExportacao)){
					$dadosExportacao3 = array('data' => $dadosExportacoes['created_at'], 'quantidade' => $dadosExportacoes['total_lines'], 'nome_lista' => $listaExportacao['name'], 'status' => $dadosExportacoes['status']);
					$block->assign('dadosExportacao3', $dadosExportacao3);
				}				
			}
			if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_2') != ''){			
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'contact_imports/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_2');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$dadosExportacoes = $this->call();
				
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'lists/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_lista_exportacao_2');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$listaExportacao = $this->call();
								
				if (isset($dadosExportacoes['id']) && isset($listaExportacao)){
					$dadosExportacao2 = array('data' => $dadosExportacoes['created_at'], 'quantidade' => $dadosExportacoes['total_lines'], 'nome_lista' => $listaExportacao['name'], 'status' => $dadosExportacoes['status']);
					$block->assign('dadosExportacao2', $dadosExportacao2);
				}						
			}
			if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_1') != ''){			
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'contact_imports/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_1');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$dadosExportacoes = $this->call();
				
				$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
				$this->_subCommand = 'lists/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_lista_exportacao_1');            
				$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
				$listaExportacao = $this->call();
								
				if (isset($dadosExportacoes['id']) && isset($listaExportacao)){
					$dadosExportacao1 = array('data' => $dadosExportacoes['created_at'], 'quantidade' => $dadosExportacoes['total_lines'], 'nome_lista' => $listaExportacao['name'], 'status' => $dadosExportacoes['status']);
					$block->assign('dadosExportacao1', $dadosExportacao1);
				}				
			}
																
			$block->assign('dadosListas', $dadosListas);
	   }
	   
        $this->_addContent($block);
		$this->_setActiveMenu('Locaweb');
		
		$this->renderLayout();			
    }
    
	public function verificarContaAction()
    {	
		$post = $this->getRequest()->getPost();
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Erro ao Buscar dados do Formulário.'));
            }
            		
			Mage::log ('### [Locaweb] Id da Conta Postado:'. $post['EmailMarketing']['id_da_conta'] , null, 'EmailMarketing.log');
			Mage::log ('### [Locaweb] Chave de Acesso Postado:'. $post['EmailMarketing']['chave_de_acesso'] , null, 'EmailMarketing.log');
			
			$this->_command    = 'accounts';
			$this->_subCommand = $post['EmailMarketing']['id_da_conta'];            
			$this->_apiKey = $post['EmailMarketing']['chave_de_acesso'];
			$retornoCall = $this->call();
												
			Mage::log ('### [Locaweb] Retorno Call: '. $retornoCall['display_name'] , null, 'EmailMarketing.log');
								
			if (isset($retornoCall['display_name'])){			
				Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_da_conta', $post['EmailMarketing']['id_da_conta']);
				Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/chave_de_acesso', $post['EmailMarketing']['chave_de_acesso']);
				Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/nome_da_conta', $retornoCall['display_name']);
			
				Mage::app()->getCacheInstance()->cleanType('config');
			
				$message = $this->__('Conta verificada com sucesso!');
				Mage::getSingleton('adminhtml/session')->addSuccess($message);
			}   
			
        } catch (Exception $e) {
			Mage::log ('### [Locaweb] Erro ao processar verificacao de conta' . $e->getMessage(), null, 'EmailMarketing.log');
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*');       
    }

	public function exportarClientesAction()
    {	
		$post = $this->getRequest()->getPost();
		
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Erro ao Buscar dados do Formulário.'));
            }
            		
			Mage::log ('### [Locaweb] Id da Lista de Postagem:'. $post['EmailMarketing']['id_lista_exportar'] , null, 'EmailMarketing.log');
			
			$listaClientes = Mage::getModel('customer/customer')
			->getCollection()
			->addAttributeToSelect('*');
			
			$listContatos = '{"list" : {"contacts" : [';
			
			foreach ($listaClientes as $cliente) {				
				Mage::log ('### [Locaweb] Nome cliente:'. $cliente['firstname'] , null, 'EmailMarketing.log');
				Mage::log ('### [Locaweb] Email cliente:'. $cliente['email'] , null, 'EmailMarketing.log');
				
				$listContatos = $listContatos. '{"email": "' . $cliente['email'] . '", "name": "' . $cliente['firstname'] . '"},';
			}			
			$listContatos = substr_replace($listContatos ,"",-1);			
			$listContatos = $listContatos . '],"overwriteattributes" : true}}';
			
			Mage::log ('### [Locaweb] Lista Parametro:'. $listContatos , null, 'EmailMarketing.log');
			
			$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
			$this->_subCommand = 'lists/'.$post['EmailMarketing']['id_lista_exportar'].'/import';            
			$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');
			$this->_data = $listContatos;
			$retornoExportacao = $this->call();
			
			if (isset($retornoExportacao['id'])){
				Mage::log ('### [Locaweb] Retorno Exportacao:'. $retornoExportacao['id'] , null, 'EmailMarketing.log');
				
				if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_1') == ""){
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_1', $retornoExportacao['id']);
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_1', $post['EmailMarketing']['id_lista_exportar']);
				}else if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_2') == ""){
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_2', $retornoExportacao['id']);
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_2', $post['EmailMarketing']['id_lista_exportar']);
				}else if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_3') == ""){
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_3', $retornoExportacao['id']);
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_3', $post['EmailMarketing']['id_lista_exportar']);
				}else if (Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_4') == ""){
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_4', $retornoExportacao['id']);
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_4', $post['EmailMarketing']['id_lista_exportar']);
				}else{
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_1', Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_2'));
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_1', Mage::getStoreConfig('Locaweb/EmailMarketing/id_lista_exportacao_2'));
					
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_2', Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_3'));
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_2', Mage::getStoreConfig('Locaweb/EmailMarketing/id_lista_exportacao_3'));
					
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_3', Mage::getStoreConfig('Locaweb/EmailMarketing/id_exportacao_4'));
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_3', Mage::getStoreConfig('Locaweb/EmailMarketing/id_lista_exportacao_4'));
					
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_4', $retornoExportacao['id']);
					Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_4', $post['EmailMarketing']['id_lista_exportar']);
				}
				
				Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/lista_selecionada_padrao', $post['EmailMarketing']['id_lista_exportar']);
				
				Mage::app()->getCacheInstance()->cleanType('config');
				
				$message = $this->__('Clientes exportados com sucesso!');
				Mage::getSingleton('adminhtml/session')->addSuccess($message);
			}
						
        } catch (Exception $e) {
			Mage::log ('### [Locaweb] Erro ao exportar cliente' . $e->getMessage(), null, 'EmailMarketing.log');
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*');       
    }

	public function trocarUsuarioAction()
    {
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_da_conta', '');
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/chave_de_acesso', '');
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/nome_da_conta', '');
		
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_1', '');
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_1', '');
		
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_2', '');
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_2', '');
		
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_3', '');
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_3', '');
		
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_exportacao_4', '');
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/id_lista_exportacao_4', '');
		
		Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/lista_selecionada_padrao', '');
		
		Mage::app()->getCacheInstance()->cleanType('config');
		
		$this->_redirect('*/*');
	}
	
	public function criarListaContatosAction(){
		$post = $this->getRequest()->getPost();
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Erro ao Buscar dados do Formulário.'));
            }
            		
			Mage::log ('### [Locaweb] Nome da Lista:'. $post['EmailMarketing_CriarLista']['nome_da_lista'] , null, 'EmailMarketing.log');
			Mage::log ('### [Locaweb] Descrição da Lista:'. $post['EmailMarketing_CriarLista']['descricao_da_lista'] , null, 'EmailMarketing.log');
			
			$this->_command    = 'accounts/'.Mage::getStoreConfig('Locaweb/EmailMarketing/id_da_conta');
			$this->_subCommand = 'lists/';  
			$this->_apiKey = Mage::getStoreConfig('Locaweb/EmailMarketing/chave_de_acesso');		
			$listCriarLista = '{"list" : {"name" : "'.$post['EmailMarketing_CriarLista']['nome_da_lista'].'","description" : "'.$post['EmailMarketing_CriarLista']['descricao_da_lista'].'"}}';
			$this->_data = $listCriarLista;			
			$retornoCall = $this->call();
																			
			if (isset($retornoCall['id'])){		
				Mage::getModel('core/config')->saveConfig('Locaweb/EmailMarketing/lista_selecionada_padrao', $retornoCall['id']);
				Mage::app()->getCacheInstance()->cleanType('config');
				
				$message = $this->__('Lista criada com sucesso!');
				Mage::getSingleton('adminhtml/session')->addSuccess($message);
			}   
			
        } catch (Exception $e) {
			Mage::log ('### [Locaweb] Erro ao processar criacao de lista' . $e->getMessage(), null, 'EmailMarketing.log');
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*');       		
	}
	
	//Funções de Comunicação Rest
	private function getUrlRest()
    {
        $url = $this->_url . self::USP . $this->_command . self::USP . $this->_subCommand;
        if (count($this->_params)) {
            foreach ($this->_params as $key=> $value) {
                $url = $url . self::USP . $key . self::USP . $value;
            }
        }
        return $url;
    }
	
	private function call()
    {
        if ($curl = curl_init()) {
            $result = false;
            $header = array('Content-Type: application/json', 'X-Auth-Token: ' . $this->_apiKey);

            curl_setopt($curl, CURLOPT_URL, $this->getUrlRest());
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

			if (isset($this->_data)){
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $this->_data); 
			}
			
            try {
                $response = curl_exec($curl);
                $result   = $this->parseResult($response, $curl);
            } catch (Exception $e) {				
                throw $e;
            }

            return $result;
        }
        return false;
    }
	
	private function parseResult($response, &$curl)
    {
        try {
            $info = curl_getinfo($curl);
            $code = $info['http_code'];
			
			Mage::log ('### [Locaweb] Codigo de Retorno da Chamada: ' . $code, null, 'EmailMarketing.log');
			Mage::log ('### [Locaweb] URL de Retorno da Chamada: ' . $info['url'], null, 'EmailMarketing.log');
			
            switch ($code) {
				case 400:
					Mage::getSingleton('adminhtml/session')->addError('Não foi possível processar a solicitação. Tente novamente.');                                 
                    break;
                case 401:
					Mage::getSingleton('adminhtml/session')->addError('Id da Conta ou Chave de Acesso inválidos. Verifique os dados e tente novamente.');             
                    break;
				case 403:
					Mage::getSingleton('adminhtml/session')->addError('Não foi autorizado o seu acesso na ferramenta Email Marketing Locaweb. Verifique os dados de acesso e tente novamente.');                                 
                    break;
				case 404:
					Mage::getSingleton('adminhtml/session')->addError('Servidor indisponível. Tente novamente.');                                 
                    break;	
				case 409:
					Mage::getSingleton('adminhtml/session')->addError('Ocorreu um conflito no servidor. Tente novamente.');                                 
                    break;	
				case 409:
					Mage::getSingleton('adminhtml/session')->addError('Tamanho do corpo da requisição é maior que o esperado. Tente novamente.');                                 
                    break;	
                case 500:
					Mage::getSingleton('adminhtml/session')->addError('Erro interno no servidor. Aguarde alguns instantes e tente novamente.');                                 
                    break;
				case 504:
					Mage::getSingleton('adminhtml/session')->addError('Servidor indisponível no momento. Por favor, tente novamente mais tarde.');                                 
                    break;
            }
			
			Mage::log ('### [Locaweb] Resposta do Servidor: ' . $response, null, 'EmailMarketing.log');
			
            $data = Mage::helper('core')->jsonDecode($response);
            if (isset($data['ErrorCode'])) {
                throw new Exception($data['Message'], $data['ErrorCode']);
            }
			
            return $data;
        } catch (Exception $e) {
            $this->_errorCode    = $e->getCode();
            $this->_errorMessage = $e->getMessage();
        }
        curl_close($curl);
        return false;
    }
}