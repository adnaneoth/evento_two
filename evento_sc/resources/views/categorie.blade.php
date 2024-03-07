@extends('layouts/navigation')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8"style="margin-top: 60px;">
                <h2>Categories</h2>
                <table class="table">
                    <thead>
                        @foreach ($Categories as $Categorie)
                            <tr>
                                <td>{{ $Categorie->name }}</td>
                                <td>
                                    <a href="{{ route('categorie.edit', $Categorie) }}" class="btn btn-primary"
                                        data-toggle="modal" data-target="#editCategoryModal">update</a>
                                    <form action="{{ route('categorie.destroy', $Categorie->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-light btn btn-danger"
                                            style="color: #ff0202">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <!-- Add more rows as needed -->
                        </tbody>
                </table>
            </div>
            <!-- Sidebar -->
            <div class="col-md-4" style="margin-top: 60px;">
                <h2>Add Category</h2>
                <form method="post" action="{{ route('categorie.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categorie" name="categorie"
                            placeholder="event Category">
                    </div>
                    <button type="submit" class="btn btn" style="background-color: #FF5722;">Add Category</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categorie.update', $Categorie) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Nom du Categorie :</label>
                            <input type="text" class="form-control" id="title" name="name"
                                value="{{ $Categorie->name }}">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
