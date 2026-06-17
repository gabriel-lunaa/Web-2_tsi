from django.shortcuts import render, redirect, get_object_or_404
from .models import Autor, Livro


def home(request):
    return render(request, 'home.html')


# AUTORES

def autor_list(request):
    autores = Autor.objects.all()
    return render(request, 'autores/list.html', {
        'autores': autores
    })


def autor_create(request):

    if request.method == 'POST':
        Autor.objects.create(
            nome=request.POST['nome'],
            email=request.POST['email']
        )

        return redirect('autor_list')

    return render(request, 'autores/create.html')


def autor_edit(request, id):

    autor = get_object_or_404(Autor, id=id)

    if request.method == 'POST':
        autor.nome = request.POST['nome']
        autor.email = request.POST['email']
        autor.save()

        return redirect('autor_list')

    return render(request, 'autores/edit.html', {
        'autor': autor
    })


def autor_delete(request, id):

    autor = get_object_or_404(Autor, id=id)

    autor.delete()

    return redirect('autor_list')


# LIVROS

def livro_list(request):

    livros = Livro.objects.select_related('autor')

    return render(request, 'livros/list.html', {
        'livros': livros
    })


def livro_create(request):

    autores = Autor.objects.all()

    if request.method == 'POST':

        Livro.objects.create(
            titulo=request.POST['titulo'],
            paginas=request.POST['paginas'],
            autor_id=request.POST['autor']
        )

        return redirect('livro_list')

    return render(request, 'livros/create.html', {
        'autores': autores
    })