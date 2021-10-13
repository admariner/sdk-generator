part of appwrite.models;

/// Documents List
class DocumentList implements Model {
    /// Total sum of items in the list.
    final int sum;
    /// List of documents.
    final List<Document> documents;

    DocumentList({
        required this.sum,
        required this.documents,
    });

    factory DocumentList.fromMap(Map<String, dynamic> map) {
        return DocumentList(
            sum: map['sum'],
            documents: List<Document>.from(map['documents'].map((p) => Document.fromMap(p))),
        );
    }

    @override
    Map<String, dynamic> toMap() {
        return {
            "sum": sum,
            "documents": documents.map((p) => p.toMap()),
        };
    }

    List<T> convertTo<T>(T Function(Map) fromJson) =>
        documents.map((d) => d.convertTo<T>(fromJson)).toList();
}
