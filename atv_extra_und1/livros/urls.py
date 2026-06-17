from django.urls import path
from . import views

urlpatterns = [
    path('', views.home, name='home'),

    path('autores/', views.autor_list, name='autor_list'),
    path('autores/novo/', views.autor_create, name='autor_create'),
    path('autores/editar/<int:id>/', views.autor_edit, name='autor_edit'),
    path('autores/excluir/<int:id>/', views.autor_delete, name='autor_delete'),

    path('livros/', views.livro_list, name='livro_list'),
    path('livros/novo/', views.livro_create, name='livro_create'),
]