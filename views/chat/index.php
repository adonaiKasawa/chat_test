<main class="container">
  <div class="bg-light p-5 rounded mt-5">


    <div class="row">
      <div class="col-4">
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            Amis
          </div>
          <ul class="list-group list-group-flush listFriends">
            
          </ul>
        </div>
      </div>
      <div class="col-8">
        <div class="card">
          <div class="card-header">
            Message
          </div>
          <div class="card-body listMessageByUser" style="height: 400px; overflow-y: scroll;">
      
          </div>
          <div class="card-footer text-muted">
            <div class="row">
              <div class="col-8">
              <textarea class="form-control" id="message">

              </textarea>
              </div>
              <div class="col-4">
                <button class="btn btn-primary sendMessage">Envoyer</button>
                 <input type="hidden" id="to_user_id" value="0">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>