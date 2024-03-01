
  <span id="msgAlertaErro"><div class="alert alert-success">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div></span>

              <div class="row contentBox mt-5">
                  <div class="col-md-4 col-lg-4 box mb-4">
                    <img src="app/template/img/adicionar.png" class="w-25">
                    <div class="boxBody">
                         Aqui, você pode fornecer informações essenciais sobre o  projeto de software.Que se pretende gerar as <strong class="text-muted">Fq</strong>
                    </div>
                    <div class="boxFooter"> 
                        <a href="#" class="buttom buttom-primary" data-bs-toggle="modal" data-bs-target="#cadastraSoftwareModal">Adicionar</a>
                    </div>
                  </div> 

                   {% for software in softwares %}

                    <div class="col-md-4 col-lg-4 box mb-4" id="box-hover">
                      <img src="app/template/img/softwares/{{software.imagem}}" class="header">
                      <div class="boxBody">
                          <h5>{{software.nome}}</h5>
                          <p class="mb-0">{{software.descricao}}</p>
                      </div>
                      <div class="boxFooter">
                          <a href="?pagina=artigo&id={{software.id}}" class="buttom buttom-primary">Gerir fq</a>
                      </div>
                    </div>

                   {% endfor %}
              </div>