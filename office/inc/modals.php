<!-- Corse tab Edit Modal -->
<div class="modal fade" id="courseTabEditModal" tabindex="-1" role="dialog" aria-labelledby="courseTabEditModaldg"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseTabEditModal">Course Tab Edit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="courseTabEditId" id="coursetab-edit-id">
                    <div class="form-group">
                        <label for="coursetab-edit-name">Course Tab Name</label>
                        <input type="text" class="form-control" id="coursetab-edit-name" name="courseTabEditName" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="coursetab-edit-status">Status</label>
                        <select class="form-control" id="coursetab-edit-status" name="courseTabEditStatus" required>
                        <option value=''>-- Select --</option>
                        <option value='0'>Active</option>
                        <option value="1">InActive</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateCourseTab" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Corse tab Delete Modal -->
<div class="modal fade" id="courseTabDeleteModal" tabindex="-1" role="dialog" aria-labelledby="courseTabEditModaldg"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseTabEditModal">Course Tab Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="courseTabDeleteId" id="coursetab-delete-id">
                    <div class="form-group">
                        <label for="coursetab-delete-name">Course Tab Name</label>
                        <input type="text" class="form-control" id="coursetab-delete-name" name="courseTabDeleteName" placeholder="Enter email" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="coursetab-delete-status">Status</label>
                        <select class="form-control" id="coursetab-delete-status" name="courseTabDeleteStatus" required readonly>
                        <option value=''>-- Select --</option>
                        <option value='0'>Active</option>
                        <option value="1">InActive</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleteCourseTab" class="btn btn-danger">Delete CourseTab</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Course Delete Modal -->
<div class="modal fade" id="courseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="courseDeleteModaldg"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseDeleteModal">Course Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="courseDeleteId" id="course-delete-id">
                    <div class="form-group">
                        <label for="course-delete-name">Course Name</label>
                        <input type="text" class="form-control" id="course-delete-name" name="courseDeleteName" placeholder="Enter email" required readonly>
                    </div>

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleteCourse" class="btn btn-danger">Delete Course</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="studentEditModaldg"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentEditModal">Student Edit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="student-edit-id">Student ID</label>
                        <input type="text" class="form-control" id="student-edit-id" name="studentEditId" placeholder="Student ID" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="student-edit-email">Student Email</label>
                        <input type="text" class="form-control" id="student-edit-email" name="editStudentEmail" placeholder="Student Email" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="student-edit-status">Account Verification</label>
                        <select class="form-control" id="student-edit-status" name="studentVerification" required>
                        <option value=''>-- Select --</option>
                        <option value='0'>NotVerified</option>
                        <option value="1">Verified</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateStudent" class="btn btn-primary">Update Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Student Modal -->
<div class="modal fade" id="studentDeleteModal" tabindex="-1" role="dialog" aria-labelledby="studentDeleteModaldg"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentDeleteModal">Student Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="student-delete-id">Student ID</label>
                        <input type="text" class="form-control" id="student-delete-id" name="studentDeleteId" placeholder="Student ID" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="student-delete-name">Student Name</label>
                        <input type="text" class="form-control" id="student-delete-name" name="deleteStudentName" placeholder="Student Name" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="student-delete-email">Student Email</label>
                        <input type="text" class="form-control" id="student-delete-email" name="deleteStudentEmail" placeholder="Student Email" required readonly>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleteStudent" class="btn btn-danger">Delete Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Ann Modal -->
<div class="modal fade" id="AnnDeleteModal" tabindex="-1" role="dialog" aria-labelledby="AnnDeleteModaldg"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AnnDeleteModal">Announcement Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="ann-delete-id">Ann. ID</label>
                        <input type="text" class="form-control" id="ann-delete-id" name="AnnDeleteId" placeholder="Ann. ID" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="ann-delete-title">Ann. Title</label>
                        <input type="text" class="form-control" id="ann-delete-title" name="deleteAnnTitle" placeholder="Ann. Name" required readonly>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleteAnn" class="btn btn-danger">Delete Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Offer Edit Modal -->
<div class="modal fade" id="editOfferModal" tabindex="-1" role="dialog" aria-labelledby="editOfferModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOfferModal">Edit Offer</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="offerEditId">Offer Id</label>
                        <input type="text" class="form-control" id="offerEditId" name="offerEditId" placeholder="Offer ID" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="offerEditName">Offer Name</label>
                        <input type="text" class="form-control" id="offerEditName" name="offerEditName" placeholder="Offer Name" required>
                    </div>
                    <div class="form-group"> 
                        <label for="offerEditAt">Offer At <small>( IN % ONLY )</small></label>
                        <input type="number" class="form-control" id="offerEditAt" name="offerEditAt" placeholder="Offer At in %" required>
                    </div>
                    <div class="form-group">
                        <label for="offerStatus">Offer Status</label>
                        <select class="form-control" id="offerStatus" name="offerStatus" required>
                        <option value=''>-- Select --</option>
                        <option value='0'>Active</option>
                        <option value="1">InActive</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateOffer" class="btn btn-primary">Update Offer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Offer Delete Modal -->
<div class="modal fade" id="deleteOfferModal" tabindex="-1" role="dialog" aria-labelledby="deleteOfferModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteOfferModal">Delete Offer</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="offerDeleteId">Offer Id</label>
                        <input type="text" class="form-control" id="offerDeleteId" name="offerDeleteId" placeholder="Offer ID" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="offerDeleteName">Offer Name</label>
                        <input type="text" class="form-control" id="offerDeleteName" name="offerDeleteName" placeholder="Offer Name" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="offerDeleteAt">Offer At <small>( IN % ONLY )</small></label>
                        <input type="number" class="form-control" id="offerDeleteAt" name="offerDeleteAt" placeholder="Offer At in %" required readonly>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateOffer" class="btn btn-danger">Delete Offer</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Video Edit Modal -->
<div class="modal fade" id="courseVideoEditModal" tabindex="-1" role="dialog" aria-labelledby="courseVideoEditModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseVideoEditModal">Edit Video</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form action="" method="POST">

                        <input type="hidden" class="form-control" id="videoEditId" name="videoEditId" placeholder="Video ID" required readonly>

                    <div class="form-group"> 
                        <label for="editVideoTitle">Video Title</label>
                        <input type="text" class="form-control" id="editVideoTitle" name="editVideoTitle" placeholder="Video Title" required>
                    </div>
                    <div class="form-group"> 
                        <label for="editVideoId">Video ID <small>( <a href="find-video-id-process" target="_blank">Video ID ?</a> )</small></label>
                        <input type="text" class="form-control" id="editVideoId" name="editVideoId" placeholder="Video ID" oninput="AddPreviewLink(this.value)" required>
                        <small>After adding video ID <b><a href="#" id="previewVideoOnModal" target="_blank">CLICK HERE</a></b> to Preview.</small>
                    </div>
                    <div class="form-group">
                        <label for="editvideoStatus">Video Status</label>
                        <select class="form-control" id="editvideoStatus" name="editvideoStatus" required>
                            <option value=''>-- Select --</option> 
                            <option value='0'>Public (Active)</option>
                            <option value="1">Private (InActive)</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updateCourseVideo" class="btn btn-primary">Update Video</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Video Delete Modal -->
<div class="modal fade" id="courseVideoDeleteModal" tabindex="-1" role="dialog" aria-labelledby="courseVideoDeleteModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseVideoDeleteModal">Delete Video</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form action="" method="POST">

                    <input type="hidden" class="form-control" id="videoDeleteId" name="videoDeleteId" placeholder="Video ID" required readonly>

                    <div class="form-group"> 
                        <label for="DeleteVideoTitle">Video Title</label>
                        <input type="text" class="form-control" id="DeleteVideoTitle" name="DeleteVideoTitle" placeholder="Video Title" required readonly>
                    </div>
                    <div class="form-group"> 
                        <label for="DeleteVideoId">Video ID</label>
                        <input type="text" class="form-control" id="DeleteVideoId" name="DeleteVideoId" placeholder="Video ID" required readonly>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="deleteCourseVideo" class="btn btn-danger">Delete Video</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Video Add Modal -->
<div class="modal fade" id="courseVideoaddModal" tabindex="-1" role="dialog" aria-labelledby="courseVideoaddModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="courseVideoaddModal">Add New Video</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form action="" method="POST">

                        <input type="hidden" class="form-control" id="videoaddCTId" name="videoaddCTId" placeholder="Video Course Tab ID" required readonly>
                        <input type="hidden" class="form-control" id="videoaddCId" name="videoaddCId" placeholder="Video Course ID" required readonly>

                    <div class="form-group"> 
                        <label for="addVideoTitle">Video Title</label>
                        <input type="text" class="form-control" id="addVideoTitle" name="addVideoTitle" placeholder="Enter Video Title" required>
                    </div>
                    <div class="form-group"> 
                        <label for="addVideoId">Video ID <small>( <a href="find-video-id-process" target="_blank">Video ID ?</a> )</small></label>
                        <input type="text" class="form-control" id="addVideoId" name="addVideoId" placeholder="Enter Video ID" onkeyup="AddPreviewLink(this.value)" required>
                        <small>After adding video ID <b><a href="#" id="previewVideoOnModalOnAdd" target="_blank">CLICK HERE</a></b> to Preview.</small>
                    </div>
                    <div class="form-group">
                        <label for="addvideoStatus">Video Status</label>
                        <select class="form-control" id="addvideoStatus" name="addvideoStatus" required>
                            <option value=''>-- Select --</option> 
                            <option value='0'>Public (Active)</option>
                            <option value="1">Private (InActive)</option>
                        </select>
                    </div>
                    <b>NOTE : </b> Check <b><a href="#" id="previewVideoOnModalOnAddTwo" target="_blank">Preview</a></b> Before Add, It Ignores the issues on video playing. If Preview not works then check video id again!
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addCourseVideo" class="btn btn-primary">Add New</button>
                </form>
            </div>
        </div>
    </div>
</div>