<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\BorrowedBooks;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerController extends Controller
{
    //
    public function booksList(Request $request)
    {  
        try
        {
        $query =  Books::select('book_id', 'title', 'author', 'publish_date', 'genre');
        if ($request->has('publish_date')) {
            $query->where('publish_date', $request->publish_date);
        }
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->author . '%');
        }
        if ($request->has('genre')) {
            $query->where('genre', $request->genre);
        }
        $booksList = $query->get();
        $booksList = $query->paginate(10); 
        return response()->json($booksList);
    }catch(\Exception $e){
        return response()->json([$e->getMessage()],500);
    }
       
    }

    public function addBook(Request $request)
    {
        try {
            // Validate incoming request data (optional but recommended)
            $validatedData = $request->validate([
                'title' => 'nullable|string|max:255',
                'author' => 'nullable|string|max:255',
                'publish_date' => 'nullable|date',
                'genre' => 'nullable|string|max:255',
            ]);
            // Find the book by ID
            $addBooks =new Books();
            // Create book details
            $addBooks->title = $request->title ;
            $addBooks->author = $request->author;
            $addBooks->publish_date = $request->publish_date ;
            $addBooks->genre = $request->genre;
            // Save the updated book
            $addBooks->save();
            // Return success response
            return response()->json([
                'book' => $addBooks,
                'message' => 'Books Data Created Successfully'
            ]);
            
        } catch (\Exception $e) {
            // Return error response with the exception message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateBooks(Request $request)
    {
        try {
            // Validate incoming request data (optional but recommended)
            $validatedData = $request->validate([
                'book_id' => 'required|exists:books_lists,book_id',
                'title' => 'nullable|string|max:255',
                'author' => 'nullable|string|max:255',
                'publish_date' => 'nullable|date',
                'genre' => 'nullable|string|max:255',
            ]);
    
            // Find the book by ID
            $updateBooks = Books::where('book_id', $request->book_id)->first();
            if (!$updateBooks) {
                // Return error if the book is not found
                return response()->json(['error' => 'Book not found'], 404);
            }
            // Update book details
            $updateBooks->title = $request->title ?? $updateBooks->title;
            $updateBooks->author = $request->author ?? $updateBooks->author;
            $updateBooks->publish_date = $request->publish_date ?? $updateBooks->publish_date;
            $updateBooks->genre = $request->genre ?? $updateBooks->genre;
    
            // Save the updated book
            $updateBooks->save();
            // Return success response
            return response()->json([
                'book' => $updateBooks,
                'message' => 'Books Data Updated Successfully'
            ]);
            
        } catch (\Exception $e) {
            // Return error response with the exception message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function deleteBook($book_id){
        try
        {
             $deleteBook=Books::where('book_id',$book_id)->first();
             $deleteBook->delete(); 
             return response()->json(['Deleted_Data'=>$deleteBook,'Success'=>'Book Deleted Successfully']);

        }
        catch(\Exception $e)
        {
            return response()->json([$e->getMessage()],500);
        }
    }



    // Method for borrowing a book
    public function borrowBook(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate(); // Get the authenticated user
        $bookId = $request->input('book_id');
        // Check if the book is already borrowed
        $alreadyBorrowed = BorrowedBooks::where('book_id', $bookId)
            ->where('status', 1)
            ->exists();
        if ($alreadyBorrowed) {
            return response()->json(['error' => 'Book is already borrowed by another user.'], 400);
        }
        // Create a new borrowed record
        $borrowedBook=BorrowedBooks::create([
            'user_id' => $user->id,
            'book_id' => $bookId,
            'borrowed_at' => now(),
            'status' => 1??""
        ]);
        return response()->json(['borrowed_book'=>$borrowedBook,'message' => 'Book borrowed successfully!']);
    }

    // Method for returning a book
    public function returnBook(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate(); // Get the authenticated user
        $bookId = $request->input('book_id');
        $borrowedBook = BorrowedBooks::where('user_id', $user->id)
            ->where('book_id', $bookId)
            ->where('status', 1)
            ->first();
        if (!$borrowedBook) 
        {
            return response()->json(['error' => 'No borrowed record found for this book by the user.'], 404);
        }
        // Update the borrowed record to mark it as returned
        $borrowedBook->update
        ([
            'returned_at' => now(),
            'status' => 0  
        ]);
        return response()->json(['borrowed_book'=>$borrowedBook,'message' => 'Book returned successfully!']);
    }
    
}