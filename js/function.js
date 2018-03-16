//link function for button.
function read(id, title){ //get id
  console.log(id, title);
  window.location = "/page/" + id + "/" + title; //redirect to new page, id to create route
}
